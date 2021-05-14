<?php

namespace App\Form;

use App\Entity\Persona;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombres')
            ->add('primerApellido')
            ->add('segundoApellido')
            ->add('documentoIdentidad')
            ->add('expedido', ChoiceType::class,[
                'placeholder' => 'Seleccione una opcion',
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
            ->add('genero')
            ->add('correo')
            ->add('telefono')
            ->add('gradoAcademico')
            ->add('domicilio')
            ->add('departamento')
            ->add('foto')
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
