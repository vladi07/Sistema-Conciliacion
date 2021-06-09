<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalasController extends AbstractController
{
    /**
     * @Route("/salas", name="salas")
     */
    public function index(): Response
    {
        return $this->render('salas/index.html.twig', [
            'controller_name' => 'SalasController',
        ]);
    }
}
