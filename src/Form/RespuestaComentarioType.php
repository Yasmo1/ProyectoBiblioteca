<?php

namespace App\Form;

use App\Entity\RespuestaComentario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RespuestaComentarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class, array(
                'attr' => array(
                    'class' => "form-control")
            ))
            ->add('correo',EmailType::class, array(
                'attr' => array(
                    'class' => "form-control")
            ))
            ->add('cuerpoComentario',TextareaType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'rows' => "8")
            ))
            ->add('fecha')
            ->add('publicado')
            ->add('comentario')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RespuestaComentario::class,
        ]);
    }
}
