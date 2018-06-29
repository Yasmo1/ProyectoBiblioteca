<?php

namespace App\Controller;

use App\Entity\Vguiada;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\VGuiadaType;
use Symfony\Component\HttpFoundation\Request;

class FrontendController extends Controller
{
    /**
     * @Route("/inicio", name="inicio")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('App:Noticias')->getPortadaNews();

        return $this->render('frontend/index.html.twig', [
            'news' => $news,
        ]);
    }

    /**
     * @Route("/servicios_ri", name="servicios_ri")
     */
    public function recursosInformacionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository('App:CategoriasRecursosInformacion')->findAll();
        $revista = array();
        foreach ($categorias as $key => $value) {
            if($value=="Revistas")
                $revista = $value;
        }
        $revistas = $revista->getRecursosInformacions();
        $new_revistas=array();
        foreach ($revistas as $key => $value) {
            $new_revistas[$value->getNombre()]=$value;
        }
        ksort($new_revistas);
        return $this->render('frontend/recursos_inf.html.twig', array(
            'categorias'   => $categorias,
            'revistas'=>$new_revistas,
        ));
    }

    /**
     * @Route("/servicios_vg", name="servicios_vg")
     */
    public function visitaGuiadaAction()
    {

        $entity = new Vguiada();
        $time = new \DateTime(date('d-M-Y'));
        $entity->setFecha($time);
//        $entity->setCantEstudiantes(1);
//        date
        $form   = $this->createForm(VGuiadaType::class);
        return $this->render('frontend/visita_guiada.html.twig', array(
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Route("/servicios_vg_send", name="servicios_vg_send")
     */
    public function visitaGuiadaSendAction(Request $request)
    {
        $entity = new Vguiada();
        $form = $this->createForm( VGuiadaType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datos = $form->getData();
            $Arreglo = mbsplit("@", $datos->getCorreo());

            if($Arreglo[1] == "estudiantes.upr.edu.cu")
            {
                $this->get('session')->getFlashBag()->add('danger','Sus datos no se pudieron enviar, ...@estudiantes... no puede solicitar Visita Guiada.');
                return $this->redirectToRoute('servicios_vg');
            }else
            {
                $fecha = $_POST['fecha'];
                $entity->setFecha(new \DateTime($fecha));
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                $this->get('session')->getFlashBag()->add('success', 'Sus datos fueron enviados satisfacoriamente.');
                // Aqui enviar la informacion al correo
                /*$message = \Swift_Message::class;
                $em = $this->getDoctrine()->getManager();
                //$senders = $em->getRepository('BibliotecaBundle:Backends')->getEmailsFromVG();
                $message->setFrom("biblioteca@upr.edu.cu")
                    ->setSubject("Visita Guiada")
                    ->setTo("yasmany.hernandez@upr.edu.cu")
                    ->setBody(
                        $this->renderView('frontend/vg_mail.html.twig', array(
                            'solicitud' => $entity
                        ))
                    )
                    ->setContentType('text/html');
                $this->get('mailer')->send($message);*/
            }

        } else {
            $this->get('session')->getFlashBag()->add('danger', 'Sus datos no se pudieron enviar, por favor contacte con el administrador.');
        }
        return $this->redirectToRoute('servicios_vg');
    }
}
