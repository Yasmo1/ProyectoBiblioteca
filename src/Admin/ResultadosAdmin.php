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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class ResultadosAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Informacion', ['class' => 'col-md-6'])
            ->add('proyecto')
            ->add('tiporesultado', ChoiceType::class,[
                'choices' => [
                    'Maestria' => 'Maestria',
                    'Doctorado' => 'Doctorado'
                ]])
            ->add('Resultado')
            ->end()
            ->with(' ', ['class' => 'col-md-6'])
            ->add('JefeProyecto')
            ->add('lineaI')
            ->add('anno')
            ->end()
            ->with('Resumen e Imagen', ['class' => 'col-md-12'])
            ->add('relevancia', CKEditorType::class)
            ->end()

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('proyecto')
            ->add('JefeProyecto')
            ->add('lineaI')
            ->add('anno')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('tiporesultado')
            ->add('proyecto')
            ->add('JefeProyecto')
            ->add('lineaI')
            ->add('anno')
        ;


    }
}