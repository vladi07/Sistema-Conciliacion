<?php

namespace App\Controller;

use App\Entity\SolicitudConciliacion;
use App\Form\SolicitudType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SolicitudController extends AbstractController
{
    /**
     * @Route("/solicitud", name="Solicitud")
     */
    public function index(Request $request): Response
    {
        $solicitud = new SolicitudConciliacion();
        $form = $this -> createForm(SolicitudType::class, $solicitud);
        $form -> handleRequest($request);

        if ($form -> isSubmitted() && $form -> isValid()){
            // Creamos el Usuario Creador
            $usuarioCreador = $this->getUser();
            $solicitud -> setUsuario($usuarioCreador);

            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($solicitud);
            $em -> flush();

            $this -> addFlash('success full', SolicitudConciliacion::REGISTRO_EXITOSO);

            return $this -> redirectToRoute('Solicitud');
        }

        return $this->render('solicitud/index.html.twig', [
            'controller_name' => 'Solicitud de Audiencia Conciliatoria',
            'formulario' => $form -> createView()

        ]);
    }

    /**
     * @Route ("/mis_solicitudes", name="Mis_Solicitudes")
     */
    public function MisSolicitudes(){
        $em = $this->getDoctrine()->getManager();
        $usuario = $this -> getUser();
        $solicitudes = $em -> getRepository(SolicitudConciliacion::class)->findBy(['usuario'=>$usuario]);
        return $this -> render('solicitud/MisSolicitudes.html.twig', ['solicitudes' => $solicitudes]);
    }
}
