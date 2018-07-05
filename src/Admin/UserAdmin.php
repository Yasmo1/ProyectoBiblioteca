<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Meta data', ['class' => 'col-md-6'])
            ->add('username')
            ->add('password')
            ->add('trabajador')
            ->add('email', EmailType::class)
            ->add('enabled')
            ->add('lastLogin')
            ->add('roles')
            ->end()
        ;

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('trabajador')
            ->add('email')
            ->add('enabled')
            ->add('lastLogin')
            ->add('roles')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('trabajador')
            ->add('email', EmailType::class)
            ->add('enabled')
            ->add('lastLogin')
            ->add('roles')
        ;
    }
}