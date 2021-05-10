<?php

namespace App\Controller;

use App\Entity\Usuarios;
use App\Form\UsuariosType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistroUsuariosController extends AbstractController
{
    /**
     * @Route("/registro/usuarios", name="registro_usuarios")
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $usuario = new Usuarios();
        $form = $this -> createForm(UsuariosType::class, $usuario);
        $form -> handleRequest($request);

        if ($form -> isSubmitted() && $form -> isValid()){
            $ahora = new \DateTime('now');
            $usuario -> setFechaCreacion($ahora);

            $usuario -> setPassword($passwordEncoder -> encodePassword(
                $usuario, $form['password'] -> getData()
            ));

            $em = $this -> getDoctrine() -> getManager();
            $em -> persist($usuario);
            $em -> flush();
            //creamos la llave "exito" para mostrar el mensaje en el Index del Controlador "registro_usuarios"
            //En esta parte podemos colocar constantes definidas en la entidad Usuarios
            $this->addFlash('exito', Usuarios::REGISTRO_EXITOSO);
            return $this->redirectToRoute('registro_usuarios');
        }

        return $this -> render('registro_usuarios/index.html.twig', [
            'controller_name' => 'Módulo de Administración de Usuarios',
            'formulario' => $form -> createView()
        ]);
    }
}
