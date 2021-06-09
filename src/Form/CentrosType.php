<?php

namespace App\Form;

use App\Entity\Centro;
use App\Entity\Departamentos;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                'multiple' => false,
                'expanded' => true,
                'placeholder' => 'Seleccione una opción',
                'choices' => [
                    'Privado' => 'Privado',
                    'Publico' => 'Publico'
                ],
            ])
            ->add('telefono', NumberType::class, [
                'required' => false,
            ])
            ->add('correo', EmailType::class, [
                'required' => false,
            ])
            ->add('departamento', EntityType::class,[
                'placeholder' => 'Seleccione una opcion',
                'class' => Departamentos::class,
                //Seleccionamos el campo de la entidad DEPARTAMENTO que queremos mostrar
                'choice_label' => 'nombre',
                'multiple' => false,
                'expanded' => false,
            ])
            //->add('usuarios')
            ->add('Guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            //Conectamos el FORMULARIO con la entidad CENTRO
            'data_class' => Centro::class,
        ]);
    }
}
