<?php

namespace Proyecto\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\EntityRepository;

class IndicacionesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion',TextType::class,array('label' => 'descripcion:  '))
            
           ->add('enfermedad',EntityType::class,array('class' => 'ProyectoMainBundle:Enfermedad',
            'query_builder' => function (EntityRepository $er) {
             return $er->createQueryBuilder('u')
            
            ->where('u.nombre = u.nombre');
    },
        'choice_label' => 'getNombre',
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
            'data_class' => 'Proyecto\MainBundle\Entity\Indicaciones'
        ));
    }
}
