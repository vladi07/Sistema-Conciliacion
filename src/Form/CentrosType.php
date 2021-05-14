<?php

namespace App\Form;

use App\Entity\Centro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CentrosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('direccion')
            ->add('matricula')
            ->add('tipo', ChoiceType::class, [
                'choices' => [
                    'Privado' => 'privado',
                    'Publico' => 'publico'
                ],
            ])
            ->add('telefono', NumberType::class)
            ->add('correo')
            ->add('departamento',ChoiceType::class, [
                'placeholder' => 'Seleccione una opcion',
                'choices' => [
                    'LPZ' => 'La Paz',
                    'CBBA' => 'Cochabamba',
                    'BE' => 'Beni',
                    'SZ' => 'Santa Cruz',
                    'TJ' => 'Tarija',
                    'CHU' => 'Chuquisaca',
                    'PO' => 'Potosi',
                    'OR' => 'Oruro',
                    'PA' => 'Pando',
                ],
            ])
            ->add('Guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Centro::class,
        ]);
    }
}
