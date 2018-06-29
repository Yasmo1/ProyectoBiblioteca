<?php

namespace App\Form;

use App\Entity\Vguiada;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VGuiadaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class, array(
                'attr'=>array(
                    'class'=>'form-control'
                ),
                'label'=>"Nombre y Apellidos",
            ))
            ->add('correo',EmailType::class, array(
                'attr'=>array(

                    'class'=>'form-control'
                ),
                'label'=>"Correo",
            ))
            ->add('facultad',ChoiceType::class, array(
                'choices' => array(
                    "Forestal y Agronomía",
                    "Ciencias Técnicas",
                    "Ciencias Económicas",
                    "Agronomía de Montaña",
                    "Ciencias Sociales y Humanísticas"
                ),
                'attr'=>array(

                    'class'=>'form-control'
                ),
                'label'=>"Facultad",
            ))
            ->add('carrera',TextType::class, array(
                'attr'=>array(

                    'class'=>'form-control'
                ),
                'label'=>"Carrera",
            ))
            ->add('anno',ChoiceType::class, array(
                'choices' => array("1ro","2do","3ro","4to","5to"),
                'attr'=>array(

                    'class'=>'form-control'
                ),
                'label'=>"Año",
            ))
            ->add('cantidadestudiantes',IntegerType::class, array(
                'attr'=>array(

                    'min'=>1,
                    'class'=>'form-control'
                ),
                'label'=>"Cantidad de Estudiantes",
            ))
//
            ->add('fecha', DateTimeType::class, array(
                'attr'=>array(

                    'class'=>'Hiden'
                ),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vguiada::class,
        ]);
    }
}
