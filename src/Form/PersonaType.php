<?php

namespace App\Form;

use App\Entity\Persona;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class PersonaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombres')
            ->add('primerApellido')
            ->add('segundoApellido')
            ->add('documentoIdentidad', NumberType::class)
            ->add('expedido', ChoiceType::class,[
                'placeholder' => 'Seleccione una opción',
                'choices' => [
                    'LP' => 'La Paz',
                    'CB' => 'Cochabamba',
                    'BE' => 'Beni',
                    'SZ' => 'Santa Cruz',
                    'TJ' => 'Tarija',
                    'CH' => 'Chuquisaca',
                    'PO' => 'Potosi',
                    'OR' => 'Oruro',
                    'PD' => 'Pando',
                ]
            ])
            ->add('fechaNacimiento', DateType::class,['widget' => 'single_text'])
            ->add('genero',ChoiceType::class,[
                'placeholder' => 'Seleccione una opción',
                'choices' => [
                    'FEMENINO' => 'Femenino',
                    'MASCULINO' => 'Masculino'
                ]
            ])
            ->add('correo', EmailType::class)
            ->add('telefono', NumberType::class )
            ->add('gradoAcademico')
            ->add('domicilio')
            ->add('departamento',ChoiceType::class, [
                    'placeholder' => 'Seleccione una opcion',
                    'choices' => [
                        'La Paz' => 'La Paz',
                        'Cochabamba' => 'Cochabamba',
                        'Beni' => 'Beni',
                        'Santa Cruz' => 'Santa Cruz',
                        'Tarija' => 'Tarija',
                        'Chuquisaca' => 'Chuquisaca',
                        'Potosi' => 'Potosi',
                        'Oruro' => 'Oruro',
                        'Pando' => 'Pando',
                    ],

            ])
            ->add('foto', FileType::class, [
                //'label' => 'Foto de Perfil',
                //'mapped' => false,
                //'required' => false
            ])
            ->add('Guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Persona::class,
        ]);
    }
}
