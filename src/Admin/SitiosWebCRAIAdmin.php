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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class SitiosWebCRAIAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Informacion', ['class' => 'col-md-6'])
            ->add('nombre')
            ->add('url', UrlType::class)
            ->add('administrador')
            ->end()
            ->with('Resumen e Imagen', ['class' => 'col-md-6'])
            ->add('tecnologias')
            ->add('ipmontadoservicio')
            ->addHelp('ipmontadoservicio','Ejemplo 10.2.24.156')
            ->add('imageFile', VichImageType::class)
            ->end()
            ->with('Cuerpo', ['class' => 'col-md-12'])
            ->add('descripcion', CKEditorType::class)
            ->end()

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nombre')
            ->add('url')
            ->add('fechaentradosistema')
            ->add('tecnologias')
            ->add('ipmontadoservicio')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nombre')
            ->add('url')
            ->add('fechaentradosistema')
            ->add('tecnologias')
            ->add('ipmontadoservicio')
            ->add('imagenportada', null, array(
                'template' => 'bundles/SonataAdminBundle/imageSitiosWebCRAI.html.twig'
            ));


    }
}