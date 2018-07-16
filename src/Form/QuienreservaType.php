<?php

namespace App\Form;

use App\Entity\Quienreserva;
use App\Entity\Salas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuienreservaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('titulo', TextType::class, array(
                'attr' => array(
                    'class' => "form-control",

                )
            ))
            ->add('nombre', TextType::class, array(
                'attr' => array(
                    'class' => "form-control",

                )
            ))
            ->add('departamento', TextType::class, array(
                'attr' => array(
                    'class' => "form-control",

                )
            ))
            ->add('correo', EmailType::class, array(
                'attr' => array(
                    'class' => "form-control",
                )
            ))
            ->add('horainicio', DateTimeType::class, array(

            ))
            ->add('horafin', DateTimeType::class, array(

            ))
            ->add('cantidadparticipantes', IntegerType::class, array(

                'attr' => array(
                    'class' => "form-control"
                )
            ))
            ->add('Objetivo', TextareaType::class, array(

                'attr' => array(
                    'class' => "form-control",
                    'rows' => "4")
            ))
            ->add('sala'
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quienreserva::class,
        ]);
    }
}
