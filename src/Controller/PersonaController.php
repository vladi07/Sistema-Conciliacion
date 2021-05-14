<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Form\PersonaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonaController extends AbstractController
{
    /**
     * @Route("/registrar_persona", name="Registrar_Personas")
     */
    public function index(Request $request): Response
    {
        //Creamos un objeto de tipo "persona"
        $persona = new Persona();
        //Creamos el formulario ("primer parametroPERSONATYPE","parametro que creamos$PERSONA")
        $form = $this->createForm(PersonaType::class, $persona);
        //Verificamos que el formulario fue enviado, pasamos como parametro el ($request)
        $form -> handleRequest($request);
        //Verificamos que los datos sean validos y guradamos el formulario
        if($form -> isSubmitted()&& $form->isValid()){
            //EntityManager crea, persiste, edita, revomer, eliminar o buscar en la base de datos
            $em = $this-> getDoctrine()->getManager();
            //Persistir el objeto $persona
            $em -> persist($persona);
            $em -> flush();

            // Mensaje de registro exitoso y como parametros
            // La llave es "success", la constante registrado la entidad
            $this -> addFlash('success', Persona::REGISTRO_EXITOSO);

            //Retornamos una redireccion edireccionamos a la ventana principal
            return $this -> redirectToRoute('Registrar_Personas');

        }
        return $this->render('persona/index.html.twig', [
            'controller_name' => 'Registrar Persona',
            'formulario' => $form -> createView()
        ]);
    }
}
