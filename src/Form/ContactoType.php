<?php

namespace App\Form;

use App\Entity\Contacto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, array(
                    'attr' => array(
                        'class' => "form-control")
                )
            )
            ->add('pais', CountryType::class, array(
                    'attr' => array(
                        'class' => "form-control")
                )
            )
            ->add('correo',EmailType::class, array(
                    'attr' => array(
                        'class' => "form-control")
                )
            )
            ->add('trabajo', TextType::class, array(
                    'attr' => array(
                        'class' => "form-control")
                )
            )
            ->add('contenido', TextareaType::class, array(
                    'attr' => array(
                        'class' => "form-control",
                        'rows' => "5")
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contacto::class,
        ]);
    }
}
