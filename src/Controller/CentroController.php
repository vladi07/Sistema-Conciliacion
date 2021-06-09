<?php

namespace App\Controller;

use App\Entity\Centro;
use App\Entity\Departamentos;
use App\Form\CentrosType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CentroController extends AbstractController
{
    /**
     * @Route("/centro", name="Centro")
     */
    public function index(Request $request): Response
    {
        //Creamos el objeto CENTRO
        $centro = new Centro();
        //Creamos el FORMULARIO
        $form = $this -> createForm(CentrosType::class, $centro);
        $form -> handleRequest($request);

        if ($form -> isSubmitted() && $form -> isValid() ){
            $em = $this-> getDoctrine() -> getManager();
            //Asociamos los campos del form en los atributos de la entidad
            $centro = $form -> getData();
            $em -> persist($centro);
            $em -> flush();
            $this -> addFlash('success', Centro::REGISTRO_EXITOSO);

            return $this -> redirectToRoute('Centro');
        }

        return $this -> render('centro/index.html.twig', [
            'controller_name' => 'Crear Nuevo Centro de Conciliación',
            'formulario' => $form -> createView()
        ]);

    }
}
