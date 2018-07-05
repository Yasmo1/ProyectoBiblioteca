<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UsuariosAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Meta data', ['class' => 'col-md-4'])
            ->add('nombre', TextType::class)
            ->add('cargo', TextType::class)
            ->add('funcion', TextType::class)
            ->add('correo', EmailType::class)
            ->add('telefono', TextType::class)
            ->add('fechanacimiento')
            ->add('EsMaster')
            ->end()
            ->with('Meta', ['class' => 'col-md-4'])
            ->add('DNI', TextType::class)
            ->add('numerocelular', TextType::class)
            ->add('EstadoCivil', TextType::class)
            ->add('categoriadocente', TextType::class)
            ->add('imageFile', VichImageType::class)
            ->add('EsDoctor')
            ->add('EsAdiestrado')
            ->end()
            ->with('data', ['class' => 'col-md-4'])
            ->add('departamento')
            ->add('grupodetrabajo')
            ->add('EsDocente')
            ->add('nivelescolar', TextType::class)
            ->add('direccionparticular', TextareaType::class)
            ->end()
        ;

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('cargo')
            ->add('funcion')
            ->add('correo')
            ->add('telefono')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nombre')
            ->add('departamento')
            ->add('cargo')
            ->add('funcion')
            ->add('correo')
            ->add('telefono')
            ->add('image', null, array(
                'template' => 'bundles/SonataAdminBundle/imageUsuarios.html.twig'
            ))
        ;
    }
}