<?php

namespace App\Controller;

use App\Entity\Quienreserva;
use App\Entity\RespuestaComentario;
use App\Entity\Vguiada;
use App\Form\ContactoType;
use App\Form\QuienreservaType;
use App\Form\RespuestaComentarioType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\VGuiadaType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contacto;
use App\Entity\Comentarios;
use App\Form\ComentariosType;


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

    /**
     * @Route("/biblioteca_formacion", name="biblioteca_formacion")
     */
    public function formacionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $docentes = $em->getRepository('App:Usuarios')->findByEsDocente(True);
        $masters = $em->getRepository('App:Usuarios')->findByEsMaster(True);
        $doctores = $em->getRepository('App:Usuarios')->findByEsDoctor(True);
        $ProfesorI = $em->getRepository('App:Usuarios')->findBycategoriadocente("Profesor Instructor");
        $ProfesorA = $em->getRepository('App:Usuarios')->findBycategoriadocente("Profesor Asistente");
        $ProfesorAux = $em->getRepository('App:Usuarios')->findBycategoriadocente("Profesor Auxiliar");
        $ProfesorT = $em->getRepository('App:Usuarios')->findBycategoriadocente("Profesor Titular");
        $Adiestrados = $em->getRepository('App:Usuarios')->findByEsAdiestrado(True);
        $AsignaturaServicioPregrado = $em->getRepository('App:AsignaturaServicioPregrado')->findAll();
        $Semestre = $em->getRepository('App:Semestre')->findAll();
        $Postgrado = $em->getRepository('App:ActividadPostgrado')->findAll();


        return $this->render('frontend/formacion.html.twig', array(
            'docentes' => $docentes,
            'masters' => $masters,
            'doctores' => $doctores,
            'ProfesorI' => $ProfesorI,
            'ProfesorA' => $ProfesorA,
            'ProfesorAux' => $ProfesorAux,
            'ProfesorT' => $ProfesorT,
            'Adiestrados' => $Adiestrados,
            'AsignaturaServicioPregrado' => $AsignaturaServicioPregrado,
            'Semestre' => $Semestre,
            'Postgrado' => $Postgrado,
        ));
    }

    /**
     * @Route("/biblioteca_investigaciones", name="biblioteca_investigaciones")
     */
    public function investigacionesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $PII = $em->getRepository('App:PII')->findAll();
        $Investigaciones = $em->getRepository('App:Investigaciones')->findAll();
        $Liniainvestigacion = $em->getRepository('App:Liniainvestigacion')->findAll();
        $hoy = getdate();
        $Resultados = $em->getRepository('App:Resultados')->findByanno($hoy ['year']-1);

        return $this->render('frontend/investigaciones.html.twig', array(
            'PII' => $PII,
            'Investigaciones' => $Investigaciones,
            'Resultados' => $Resultados,
            'anno' => $hoy ['year']-1,
            'Liniainvestigacion' => $Liniainvestigacion,

        ));
    }

    /**
     * @Route("/biblioteca_noticias", name="biblioteca_noticias")
     */
    public function noticiasAction()
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('App:Noticias')->getPublicNews();
        return $this->render('frontend/noticias.html.twig',array(
            'news'=>$news
        ));
    }

    /**
     * @Route("/biblioteca_noticia_Apliada_Nuevo_Comentario/{noticia_id}", name="biblioteca_noticia_Apliada_Nuevo_Comentario")
     */
    public function noticia_Ampliada_Nuevo_Comentario(Request $request, $noticia_id)
    {
        $entity = new Comentarios();
        $form = $this->createForm(ComentariosType::class, $entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $noticia = $em->getRepository('App:Noticias')->find($noticia_id);

        if ($form->isSubmitted() &&  $form->isValid())
        {
            $entity = $entity->setNoticiaId($noticia);
            $new_date= new \DateTime();
            $entity->setFecha($new_date);
            $entity->setPublicado(false);
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'Su Comentario fue enviado satisfacoriamente.');
            /*
            // Aqui enviar la informacion al correo
            $message = \Swift_Message::newInstance();
            $em = $this->getDoctrine()->getManager();
            $senders = $em->getRepository('BibliotecaBundle:Backends')-> getEmailsFromAdmins();
            $message->setFrom(array(
                "biblioteca@upr.edu.cu"=>"Sitio ICT"
            ))
                ->setSubject("Nuevo Comentario sobre el Articulo".$noticia->getTitulo())
                ->setTo($senders)
                ->setBody(
                    $this->renderView( 'BibliotecaBundle:Default:mail_NuevoComentario.html.twig', array(
                        'id'      => $entity->getId(),
                        'nombre'       => $entity->getNombre(),
                        'correo'  => $entity->getEmail(),
                        'comentario'    => $entity->getCuerpoComen(),
                        'mensaje' => 'Comentario a noticia'
                    ) )
                )
                ->setContentType( 'text/html' );
            $this->get( 'mailer' )->send( $message );
            */
        }

        return $this->noticia_AmpliadaAction($noticia_id);

    }

    /**
     * @Route("/biblioteca_noticia_Apliada_Nuevo_RespuestaComentario/{noticia_id}", name="biblioteca_noticia_Apliada_Nuevo_RespuestaComentario")
     */
    public function noticia_Ampliada_Nueva_Respuesta(Request $request, $noticia_id)
    {
        $entity = new RespuestaComentario();
        $form = $this->createForm(RespuestaComentarioType::class, $entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() &&  $form->isValid())
        {
            $comentario = $em->getRepository('App:Comentarios')->find($_POST['id_comentario_respuesta']);
            $entity = $entity->setComentario($comentario);
            $new_date= new \DateTime();
            $entity->setFecha($new_date);
            $entity->setPublicado(false);
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'Su Comentario fue enviado satisfacoriamente.');
            /*
            // Aqui enviar la informacion al correo
            $message = \Swift_Message::newInstance();
            $em = $this->getDoctrine()->getManager();
            $senders = $em->getRepository('BibliotecaBundle:Backends')-> getEmailsFromAdmins();
            $message->setFrom(array(
                "biblioteca@upr.edu.cu"=>"Sitio ICT"
            ))
                ->setSubject("Nuevo Comentario sobre el Articulo".$noticia->getTitulo())
                ->setTo($senders)
                ->setBody(
                    $this->renderView( 'BibliotecaBundle:Default:mail_NuevoComentario.html.twig', array(
                        'id'      => $entity->getId(),
                        'nombre'       => $entity->getNombre(),
                        'correo'  => $entity->getEmail(),
                        'comentario'    => $entity->getCuerpoComen(),
                        'mensaje' => 'Comentario a noticia'
                    ) )
                )
                ->setContentType( 'text/html' );
            $this->get( 'mailer' )->send( $message );
            */
        }

        return $this->noticia_AmpliadaAction($noticia_id);

    }
    /**
     * @Route("/biblioteca_noticia_Apliada/{noticia_id}", name="biblioteca_noticia_Apliada")
     */
    public function noticia_AmpliadaAction($noticia_id)
    {
        $em = $this->getDoctrine()->getManager();
        $noticia = $em->getRepository('App:Noticias')->find($noticia_id);
        $noticias_por_misma_tematica = $em->getRepository('App:Noticias')->findBy(array('tematica' => $noticia->getTematica()),array('id' => 'DESC'));
        $noticias_por_mismo_autor = $em->getRepository('App:Noticias')->findBy(array('autor_noticia' => $noticia->getAutorNoticia()),array('id' => 'DESC'));

        $entity = new Comentarios();
        $form = $this->createForm(ComentariosType::class,$entity);

        $entity_Respuesta = new RespuestaComentario();
        $form_Respuesta = $this->createForm(RespuestaComentarioType::class,$entity_Respuesta);

        return $this->render('frontend/noticia_Ampliada.html.twig', array(
            'news' => $noticia,
            'entity' => $entity,
            'form' => $form->createView(),
            'noticias_Similares' => $noticias_por_misma_tematica,
            'noticias_mismo_autor' => $noticias_por_mismo_autor,
            'formRespuesta' => $form_Respuesta->createView()
        ));
    }
}
