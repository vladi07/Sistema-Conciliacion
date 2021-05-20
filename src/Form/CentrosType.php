<?php

namespace App\Form;

use App\Entity\Centro;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
                'placeholder' => 'Seleccione una opción',
                'choices' => [
                    'Privado' => 'Privado',
                    'Publico' => 'Publico'
                ],
            ])
            ->add('telefono', NumberType::class)
            ->add('correo', EmailType::class)
            ->add('departamento',ChoiceType::class, [
                'placeholder' => 'Seleccione una opción',
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
            //->add('usuarios')
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
