<?php
/**
 * Created by PhpStorm.
 * User: yasmo
 * Date: 31/05/2018
 * Time: 15:07
 */
namespace App\Admin;


use App\Controller\FrontendController;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\Filter\DateTimeType;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Csrf\CsrfToken;
use Twig\Token;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class NoticiasAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $user = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();

        $roles = $user->getRoles();
        $EsAdminitrativo = false;
        for($i = 0; $i < count($roles); $i++)
        {
            if($roles[$i] == "ROLE_EDITOR" || $roles[$i] == "ROLE_ADMIN" )
            {
                $EsAdminitrativo = true;
            }
        }

        if($EsAdminitrativo)
        {
            $formMapper
                ->with('Informacion', ['class' => 'col-md-6'])
                ->add('titulo')
                ->add('autor_foto_portada')
                ->add('publica')
                ->add('portada')
                ->add('autor_noticia')
                ->add('categoria')
                ->end()
                ->with('Resumen e Imagen', ['class' => 'col-md-6'])
                ->add('resumen')
                ->add('imageFile', VichImageType::class)
                ->end()
                ->with('Cuerpo', ['class' => 'col-md-12'])
                ->add('cuerpo', CKEditorType::class)
                ->end();
        }else
        {
            $formMapper
                ->with('Informacion', ['class' => 'col-md-6'])
                ->add('titulo')
                ->add('autor_foto_portada')
                ->add('autor_noticia')
                ->add('categoria')
                ->end()
                ->with('Resumen e Imagen', ['class' => 'col-md-6'])
                ->add('resumen')
                ->add('imageFile', VichImageType::class)
                ->end()
                ->with('Cuerpo', ['class' => 'col-md-12'])
                ->add('cuerpo', CKEditorType::class)
                ->end();
        }



    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('titulo')
            ->add('autor_foto_portada')
            ->add('publica')
            ->add('portada')
            ->add('fecha')
            ->add('autor_noticia')
            ->add('categoria')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('titulo')
            ->add('portada', 'boolean')
            ->add('publica', 'boolean')
            ->add('Categoria')
            ->add('autor_noticia')
            ->add('image', null, array(
                'template' => 'bundles/SonataAdminBundle/image.html.twig'
            ));


    }
}