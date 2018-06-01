<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RespuestaComentarioAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Informacion', ['class' => 'col-md-6'])
            ->add('nombre')
            ->add('correo')
            ->add('fecha')
            ->add('comentario')
            ->add('publicado')
            ->end()
            ->with('Comentario', ['class' => 'col-md-6'])
            ->add('cuerpoComentario')
            ->end()
        ;

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nombre');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('comentario')
            ->add('correo')
            ->add('fecha')
            ->add('nombre')
            ->add('publicado')
        ;
    }
}