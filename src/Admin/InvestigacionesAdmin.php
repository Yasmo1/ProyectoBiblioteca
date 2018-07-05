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
use Sonata\DoctrineORMAdminBundle\Filter\ChoiceFilter;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class InvestigacionesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Informacion', ['class' => 'col-md-6'])
            ->add('Tema')
            ->add('fechainicio')
            ->add('fechafin')
            ->end()
            ->with('  ', ['class' => 'col-md-6'])
            ->add('JefeProyecto')
            ->add('Tipo', ChoiceType::class,[
                'choices' => [
                    'Maestria' => 'Maestria',
                    'Doctorado' => 'Doctorado'
                ]])
            ->end()
            ->with('Resumen e Imagen', ['class' => 'col-md-12'])
            ->add('descripcion', CKEditorType::class)
            ->end()

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('Tema')
            ->add('fechainicio')
            ->add('fechafin')
            ->add('JefeProyecto')
            ->add('Tipo', ChoiceFilter::class,[
                'choices' => [
                    'Maestria' => 'Maestria',
                    'Doctorado' => 'Doctorado'
                ]])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('Tema')
            ->add('fechainicio')
            ->add('fechafin')
            ->add('JefeProyecto')
            ->add('Tipo', ChoiceType::class,[
                'choices' => [
                    'Maestria' => 'Maestria',
                    'Doctorado' => 'Doctorado'
                ]])
        ;


    }
}