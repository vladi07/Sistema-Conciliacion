<?php

namespace App\Controller;

use App\Entity\Departamentos;
use App\Form\DepartamentoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartamentosController extends AbstractController
{
    /**
     * @Route("/departamentos", name="Departamentos")
     */
    public function index(Request $request): Response
    {
        $departamento = new Departamentos();
        //El Formulario recibe como parametros 2 objetos: DepartamentoType y el Departamento que creamos
        $form = $this -> createForm(DepartamentoType::class, $departamento);
        //Recivimos la solicitud y vemos si el Formulario fue enviado
        $form -> handleRequest($request);

        if ($form -> isSubmitted() && $form -> isValid()){
            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($departamento);
            $em -> flush();
            $this -> addFlash('success', Departamentos::REGISTRO_EXITOSO);
            return $this -> redirectToRoute('Departamentos');
        }

        return $this->render('departamentos/index.html.twig', [
            //Definimos el nombre del cotrolador
            'controller_name' => 'Departamentos',
            'formulario' => $form -> createView()
        ]);
    }

}
