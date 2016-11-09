<?php

namespace Proyecto\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class EnfermedadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
            ->add('nombre',TextType::class)
            ->add('descripcion',TextType::class)
            ->add('estudiante',EntityType::class, array(
                    'class' => 'ProyectoMainBundle:Estudiante',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('e')
                                ->where('e.nombres = e.nombres');
                    },
                    'multiple'=>true,
                    'expanded'=>true,
                    'choice_label' => 'getNombreCompleto'
                ))
            ->add('Guardar', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\MainBundle\Entity\Enfermedad'
        ));
    }
}
