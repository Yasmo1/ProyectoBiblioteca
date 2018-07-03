<?php

namespace App\Form;

use App\Entity\Comentarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComentariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,array(
                'attr' => array(
                    'class' => "form-control")
            ))
            ->add('email',EmailType::class, array(
                'attr' => array(
                    'class' => "form-control")
            ))
            ->add('cuerpo_comen',TextareaType::class, array(
                'attr' => array(
                    'class' => "form-control",
                    'rows' => "4")
            ))
            ->add('fecha')
            ->add('publicado')
            ->add('noticia_id')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comentarios::class,
        ]);
    }
}
