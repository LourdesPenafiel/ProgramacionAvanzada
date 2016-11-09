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

class EstudianteType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('facultad', EntityType::class, array(
                    'class' => 'ProyectoMainBundle:Facultad',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('f')
                                ->where('f.carrera = f.carrera');
                    },
                    'choice_label' => 'getCompleto'
                ))
                ->add('nombres', TextType::class, array('label' => 'Nombres:  '))
                ->add('apellidos', TextType::class, array('label' => 'Apellidos:  '))
                ->add('fechadenacimiento', DateType::class, array(
                    'label' => 'Fecha de Nacimiento:  ',
                    'format'=>'yyyy   MM   dd',
                    'years' => range(date('Y'), 1950)))
                ->add('correo', TextType::class, array('label' => 'Correo:  '))
                ->add('direccion', TextType::class, array('label' => 'Direccion:  '))
                ->add('telefono', TextType::class, array('label' => 'Telefono: '))
                ->add('Guardar', SubmitType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Proyecto\MainBundle\Entity\Estudiante'
        ));
    }
}	
