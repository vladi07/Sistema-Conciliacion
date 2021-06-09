<?php

namespace App\Form;

use App\Entity\SolicitudConciliacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SolicitudType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion', TextareaType::class)
            ->add('materia', ChoiceType::class, [
                'placeholder' => 'Seleccione una opción',
                'choices' => [
                    'Civil' => 'CIVIL',
                    'Familiar' => 'FAMILIAR',
                    'Vecinal' => 'VECINAL',
                    'Comercial' => 'COMERCIAL',
                ],
            ])
            ->add('tipoConciliacion', ChoiceType::class,[
                'label' => 'Tipo de Conciliación',
                'placeholder' => 'Seleccione una opción',
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'Virtual' => 'VIRTUAL',
                    'Presencial' => 'PRESENCIAL'
                ]
            ])
            //->add('fecha')
            //->add('solicitante')
            //->add('casoConciliatorio')
            ->add('Registrar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SolicitudConciliacion::class,
        ]);
    }
}
