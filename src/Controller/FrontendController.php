<?php

namespace App\Controller;

use App\Entity\Quienreserva;
use App\Entity\Vguiada;
use App\Form\ContactoType;
use App\Form\QuienreservaType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\VGuiadaType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contacto;

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

    /**
     * @Route("/biblioteca_contacto", name="biblioteca_contacto")
     */
    public function contactoAction()
    {
        $entity = new Contacto();
        $form   = $this->createForm(ContactoType::class, $entity);

        return $this->render('frontend/contacto.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Route("/biblioteca_contacto_create", name="biblioteca_contacto_create")
     */
    public function contactoSendAction(Request $request)
    {
        $entity  = new Contacto();
        $form = $this->createForm(ContactoType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'Sus datos fueron enviados satisfacoriamente.');
           /* // Aqui enviar la informacion al correo
            $message = \Swift_Message::newInstance();
            $em = $this->getDoctrine()->getManager();
            $senders = $em->getRepository('BibliotecaBundle:Backends')-> getEmailsFromAdmins();
            $message->setFrom(array(
                "biblioteca@upr.edu.cu"=>"Sitio ICT"
            ))
                ->setSubject("Contacto")
                ->setTo($senders)
                ->setBody(
                    $this->renderView( 'BibliotecaBundle:Default:mail.html.twig', array(
                        'nombre'       => $entity->getNombre(),
                        'pais'         => $entity->getPais(),
                        'correo'  => $entity->getEmail(),
                        'lugar_trabajo'    => $entity->getTrabajo(),
                        'comentario'    => $entity->getContenido(),
                    ) )
                )
                ->setContentType( 'text/html' );
            $this->get( 'mailer' )->send( $message );*/


            return $this->redirectToRoute(('biblioteca_contacto'));
        }

        return $this->render('frontend/contacto.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * @Route("/reservars_sala", name="reservars_sala")
     */
    public function reservar_SalaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reservas = $em->getRepository('App:Quienreserva')->findAll();
        $entity = new Quienreserva();
        $entity->setHorainicio(new \DateTime());
        $entity->setHorafin(new \DateTime());
        $form   = $this->createForm(QuienreservaType::class, $entity);
        return $this->render('frontend/reservar_sala.html.twig', array(
            'form'   => $form->createView(),
            'reservas' => $reservas
        ));
    }

    /**
     * @Route("/reservars_sala_hecha", name="reservars_sala_hecha")
     */
    public function reservar_SalaSendAction(Request $request)
    {
        $entity = new Quienreserva();
        $form = $this->createForm(QuienreservaType::class, $entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $reservas = $em->getRepository('App:Quienreserva');

        if ($form->isSubmitted() &&  $form->isValid()) {
            $correo = $form->getData();
            $Arreglo = mbsplit("@", $correo->getCorreo());
            $fstrat = $correo->getHorainicio();
            $fend = $correo->getHorafin();
            $factual = new \DateTime("now");
            $sala = $correo->getSala();

            if($Arreglo[1] == "estudiantes.upr.edu.cu")
            {
                $this->get('session')->getFlashBag()->add('danger','Sus datos no se pudieron enviar, ...@estudiantes... no puede solicitar una Reserva.');
                return $this->redirectToRoute('reservars_sala');
            }else
                if($fstrat > $fend || $fstrat < $factual)
                {
                    $this->get('session')->getFlashBag()->add('danger','Sus datos no se pudieron enviar, ...verifique los horarios... no puede solicitar una Reserva.');
                    return $this->redirectToRoute('reservars_sala');
                }else
                    if(($reservas->getReservas_Ocupada($fstrat,$fend,$sala)))
                    {
                        $this->get('session')->getFlashBag()->add('danger','Sus datos no se pudieron enviar, ...La sala que intenta reservar se encuentra ocupada, por favor cambie el horario de su reserva... no puede solicitar una Reserva.');
                        return $this->redirectToRoute('reservars_sala');
                    }else
                    {
                        $entity->setPublica(False);
                        $entity->setQuienautoriza($entity->getSala()->getResponsable());
                        $em->persist($entity);
                        $em->flush();
                        $this->get('session')->getFlashBag()->add('success', 'Sus datos fueron enviados satisfacoriamente.');
                        /*// Aqui enviar la informacion al correo
                        $message = \Swift_Message::newInstance();
                        $em = $this->getDoctrine()->getManager();
                        $senders = $em->getRepository('BibliotecaBundle:Backends')->getEmailsFromVG();
                        $message->setFrom(array(
                            "biblioteca@upr.edu.cu" => "Sitio ICT"
                        ))
                            ->setSubject("Reserva de Sala")
                            ->setTo($entity->getCorreo())
                            ->addCc("yanet.blancop@upr.edu.cu")
                            ->addCc("ycollazo@upr.edu.cu")
                            ->addCc("isabel@upr.edu.cu")
                            ->addCc("arianna@upr.edu.cu")
                            ->setBody(
                                $this->renderView('BibliotecaBundle:Default:reservasala_mail.html.twig', array(
                                    'datos' => $entity,
                                    'Aprobado' => false
                                ))
                            )
                            ->setContentType('text/html');
                        $this->get('mailer')->send($message);*/
                    }



        } else {
            $this->get('session')->getFlashBag()->add('danger', 'Sus datos no se pudieron enviar, por favor contacte con el administrador.');
        }
        return $this->redirectToRoute('reservars_sala');


    }

    /**
     * @Route("/servicios_sn", name="servicios_sn")
     */
    public function salaNavegacionAction()
    {
        $today = $this->getActiveDay();
        $em = $this->getDoctrine()->getManager();
        $reservas = $em->getRepository('App:Salas')->findByNombre("Sala de Navegación");
        return $this->render('frontend/sala_navegacion.html.twig',array(
            'today'=>$today,
            'Sala' =>$reservas[0]
        ));
    }

    private function getActiveDay()
    {
        $today = date('D');
        $first = array('Mon', 'Tue', 'Wed', 'Thu');
        $today = in_array($today, $first) ? 'first' : $today;
        return $today;
    }

    /**
     * @Route("/servicios_sr", name="servicios_sr")
     */
    public function sitiosReferenciaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sitiosR = $em->getRepository('App:SitiosReferencia')->findAll();
        return $this->render('frontend/sitios_referencias.html.twig',array(
            'sitiosR'=>$sitiosR,
        ));

    }

    /**
     * @Route("/biblioteca_quienes_somos", name="biblioteca_quienes_somos")
     */
    public function qSomosAction()
    {
        return $this->render('frontend/q_somos.html.twig' );
    }

    /**
     * @Route("/biblioteca_biblioteca", name="biblioteca_biblioteca")
     */
    public function bibliotecaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $bibliotecas = $em->getRepository('App:Biblioteca')->findAll();
        $salas = $em->getRepository('App:Salas')->findAll();
        $servicios = $em->getRepository('App:ServiciosBiblioteca')->findAll();

        $today = $this->getActiveDay();
        $new_date= new \DateTime();
        $hoy = getdate();

        return $this->render('frontend/biblioteca.html.twig',array(
            'dia'=>$hoy ['wday'],
            'hora' => $hoy ['hours'],
            'min' => $hoy ['minutes'],
            'seg' => $hoy ['seconds'],
            'mes' =>$hoy ['mon'],
            'year' => $hoy ['year'],
            'bibliotecas' => $bibliotecas,
            'salas' => $salas,
            'servicios' => $servicios
        ));
    }
}
