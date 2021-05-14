<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{
    /**
     * @Route("/principal", name="Principal")
     */
    public function index(): Response
    {
        //Creamos un objeto de tipo Principal


        return $this->render('principal/index.html.twig', [
            'controller_name' => 'Ventana Principal del Sistema de Conciliación',
        ]);
    }
}
