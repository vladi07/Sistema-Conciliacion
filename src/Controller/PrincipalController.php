<?php

namespace App\Controller;

use App\Entity\Persona;
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
        $em = $this -> getDoctrine() -> getManager();
        $personas = $em -> getRepository(Persona::class) -> findAll();
        $verPersona = $em -> getRepository(Persona::class) -> find(5);
        $personalizado1 = $em -> getRepository(Persona::class)
            -> findOneBy(['nombres'=>'Carola Alejandra']);
        $personalizado2 = $em -> getRepository(Persona::class)
            -> findBy(['primerApellido'=>'Perez']);

        return $this -> render('principal/index.html.twig',[
            'personas' => $personas,
            'verPersona' => $verPersona,
            'personal1' => $personalizado1,
            'personal2' => $personalizado2
        ]);
    }
}
