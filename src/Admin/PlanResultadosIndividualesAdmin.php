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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class PlanResultadosIndividualesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Informacion', ['class' => 'col-md-6'])
            ->add('trabajador')
            ->add('docFile', FileType::class)
            ->end()
            ->with('Cuerpo', ['class' => 'col-md-12'])
            ->add('descripcion', CKEditorType::class)
            ->end()

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('trabajador')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('trabajador')
            ->add('file', null, array(
                'template' => 'bundles/SonataAdminBundle/filePlanResultadosIndividuales.html.twig'
            ));
    }
}