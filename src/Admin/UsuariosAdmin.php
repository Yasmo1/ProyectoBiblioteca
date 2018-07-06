<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UsuariosAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Informacion Personal', ['class' => 'col-md-4'])
            ->add('DNI', TextType::class)
            ->add('nombre', TextType::class)
            ->add('fechanacimiento')
            ->add('EstadoCivil', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    'Casado(a)' => 'Casado(a)',
                    'Soltero(a)' => 'Soltero(a)'
                ]])
            ->add('nivelescolar', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    'Tecnico Medio' => 'Tecnico Medio',
                    'Bachiller' => 'Bachiller',
                    'Superior' => 'Superior'
                ]])
            ->add('imageFile', VichImageType::class)
            ->end()
            ->with('Informacion de Contacto', ['class' => 'col-md-4'])
            ->add('correo', EmailType::class)
            ->add('telefono', TextType::class)
            ->add('numerocelular', TextType::class)
            ->add('direccionparticular', TextareaType::class)
            ->end()
            ->with('Informacion Laboral y Profesional', ['class' => 'col-md-4'])
            ->add('departamento')
            ->add('grupodetrabajo')
            ->add('cargo', TextType::class)
            ->add('funcion', TextType::class)
            ->add('categoriadocente', ChoiceType::class,[
                'choices' => [
                    ' ' => ' ',
                    'Profesor Instructor' => 'Profesor Instructor',
                    'Profesor Asistente' => 'Profesor Asistente',
                    'Profesor Auxiliar' => 'Profesor Auxiliar',
                    'Profesor Titular' => 'Profesor Titular'

                ]])
            ->add('EsMaster')
            ->add('EsDoctor')
            ->add('EsAdiestrado')
            ->add('EsDocente')


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