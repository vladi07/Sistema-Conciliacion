<?php

namespace App\Controller;

use App\Entity\Centro;
use App\Entity\Departamentos;
use App\Form\CentrosType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CentroController extends AbstractController
{
    /**
     * @Route("/centro", name="Centro")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $em = $this -> getDoctrine() -> getManager();
        //Llamamos a la consulta DQL personalisado en el CENTROREPOSITORY
        $query = $em -> getRepository(Centro::class) -> BuscarTodosCentros();
        //Mostramos todos los campos con ayuda de FINDALL
        //$allCentros = $em -> getRepository(Centro::class) -> findAll();

        $pagination = $paginator->paginate(
            $query, /* consulta NO resultado */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );

        return $this -> render('centro/index.html.twig',[
            'controller_name' => 'Ver Listado de Centros',
            'pagination' => $pagination
            //'todosLosCentros' => $allCentros
        ]);

    }

    /**
     * @Route("/centro/nuevo_centro", name="Nuevo_Centro")
     */
    public function crearCentro(Request $request): Response
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

        return $this -> render('centro/crearCentro.html.twig', [
            'controller_name' => 'Crear Nuevo Centro de Conciliación',
            'formulario' => $form -> createView()
        ]);
    }

     /**
     *@Route("/centro/{id}", name="Ver_mi_centro")
     */
    public function verMiCentro($id){
        //Solo se vera un CENTRO especifico
        $em = $this -> getDoctrine() -> getManager();
        $centro = $em -> getRepository(Centro::class) -> find($id);

        return $this -> render('centro/verCentro.html.twig',[
            'controller_name' => 'Ver Centros Registrados',
            'ver_centro' => $centro
        ]);
    }

    /**
     * @Route("/centro/mis-centros", name="Mis_centros")
     */
    public function MisCentros(){
        $em = $this -> getDoctrine() -> getManager();
        //Obtenemos el usuario logeado
        //$usuario = $this -> getUser();
        //$mis_centros = $em -> getRepository(Centro::class) -> findBy();
           // [
            //'usuarios' => $usuario
        //]


        //return $this -> render('centro/misCentros.html.twig',[
          //  'misCentros' => $mis_centros
        //]);
    }
}
