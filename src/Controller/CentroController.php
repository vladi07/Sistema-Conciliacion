<?php

namespace App\Controller;

use App\Entity\Centro;
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
        $centro = new Centro();
        $form = $this -> createForm(CentrosType::class, $centro);
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form ->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em -> persist($centro);
            $em -> flush();

            $this -> addFlash('success', Centro::REGISTRO_EXITOSO);
        }

        return $this->render('centro/index.html.twig', [
            'controller_name' => 'Centro Controller',
            'formulario' => $form -> createView()
        ]);
    }
}
