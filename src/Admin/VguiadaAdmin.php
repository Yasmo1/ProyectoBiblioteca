<?php
/**
 * Created by PhpStorm.
 * User: yasmo
 * Date: 31/05/2018
 * Time: 15:07
 */
namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\Filter\DateTimeType;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class VguiadaAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Informacion', ['class' => 'col-md-6'])
            ->add('nombre')
            ->add('fecha')
            ->add('facultad')
            ->end()
            ->with(' ', ['class' => 'col-md-6'])
            ->add('correo', EmailType::class)
            ->add('carrera')
            ->add('cantidadestudiantes')
            ->end()

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('fecha')
            ->add('facultad')
            ->add('correo')
            ->add('carrera')
            ->add('cantidadestudiantes')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nombre')
            ->add('fecha')
            ->add('facultad')
            ->add('correo', EmailType::class)
            ->add('carrera')
            ->add('cantidadestudiantes')
        ;


    }
}