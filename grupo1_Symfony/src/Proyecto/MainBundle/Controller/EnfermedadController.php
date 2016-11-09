<?php

namespace Proyecto\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Proyecto\MainBundle\Entity\Enfermedad;
use Proyecto\MainBundle\Form\EnfermedadType;

class EnfermedadController extends Controller {

    public function nuevoAction(Request $request) {
        $enfermedad = new Enfermedad();
        $form = $this->createForm(EnfermedadType::class, $enfermedad);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($enfermedad);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_enfermedad_nuevo'));
        }
        return $this->render("ProyectoMainBundle:Enfermedad:nuevo.html.twig", array(
                    "form" => $form->createView()
        ));
    }

    public function detalleAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $enfermedad = $em->getRepository('ProyectoMainBundle:Enfermedad')->findOneById($id);
        $form = $this->createForm(EnfermedadType::class, $enfermedad);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('proyecto_enfermedad_homepage'));
        }
         return $this->render("ProyectoMainBundle:Enfermedad:detalle.html.twig", array(
                    'nombres' => $enfermedad->getNombre(), 'apellidos' => $enfermedad->getDescripcion(), 
                    'estudiantes'=>$enfermedad->getEstudiante()));
    }

    public function nuevoEnfAction($nombre, $descripcion, $idIndicaciones) {
        $enfermedad = new Enfermedad();
        $enfermedad->setNombre($nombre);
        $enfermedad->setDescripcion($descripcion);
        $enfermedad->setIdIndicaciones($idIndicaciones);
        $em = $this->getDoctrine()->getManager();
        $em->persist($enfermedad);
        $em->flush();
        return $this->render('ProyectoMainBundle:Enfermedad:nuevo.html.twig', array('nombre' => $nombre, 'descripcion' => $descripcion, 'idIndicaciones' => $idIndicaciones));
    }

    public function listarEnfAction() {
        $em = $this->getDoctrine()->getManager();
        $enfermedad = $em->getRepository('ProyectoMainBundle:Enfermedad')->findAll();
        return $this->render("ProyectoMainBundle:Enfermedad:listar.html.twig", array("enfermedades" => $enfermedad));
    }

    public function listarPorIdEnfAction($id) {
        $em = $this->getDoctrine()->getManager();
        $enfermedad = $em->getRepository('ProyectoMainBundle:Enfermedad')->findOneById($id);
        return new Response(
                'Nombre: ' . $enfermedad->getNombre() . '</br>Descripcion: ' . $enfermedad->getDescripcion()
                . '</br>IdIndicaciones: ' . $enfermedad->getIdIndicaciones()
        );
    }

    public function modificarEnfAction($id, $nombre, $descripcion, $idIndicaciones) {
        $em = $this->getDoctrine()->getManager();
        $enfermedad = $em->getRepository('ProyectoMainBundle:Enfermedad')->find($id);
        if (!$enfermedad) {
            throw $this->createNotFoundException(
                    'No se ha encontrado la enfermedad para la id:  ' . $id
            );
        }
        $enfermedad->setNombre($nombre);
        $enfermedad->setDescripcion($descripcion);
        $enfermedad->setIdIndicaciones($idIndicaciones);
        $em->flush();
        return new Response(
                'Nombre: ' . $enfermedad->getNombre() . '</br>Descripcion: ' . $enfermedad->getDescripcion()
                . '</br>IdIndicaciones: ' . $enfermedad->getIdIndicaciones()
        );
    }

    public function eliminarEnfAction($id) {
        $em = $this->getDoctrine()->getManager();
        $enfermedad = $em->getRepository('ProyectoMainBundle:Enfermedad')->find($id);
        if (!$enfermedad) {
            throw $this->createNotFoundException(
                    'No se ha encontrado el producto para la id ' . $id
            );
        }
        $em->remove($enfermedad);
        $em->flush();
        return new Response(
                'Estudiante Eliminado !!!'
        );
    }

}
