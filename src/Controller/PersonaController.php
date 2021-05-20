<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Form\PersonaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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

            $brochureFile = $form['foto']->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    throw new \Exception('Lo siento!. Ha occurido un error');
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $persona->setFoto($newFilename);
            }

            // ... persist the $product variable or any other work


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
