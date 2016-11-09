<?php

namespace Proyecto\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Proyecto\MainBundle\Entity\Facultad;
use Proyecto\MainBundle\Form\FacultadType;

class FacultadController extends Controller {
    /* MANEJO DE FORMULARIOS: Envio de Datos */

    public function nuevoAction(Request $request) {
        $facultad = new Facultad();
        $form = $this->createForm(FacultadType::class, $facultad);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($facultad);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_facultad_nuevo'));
        }
        return $this->render("ProyectoMainBundle:Facultad:nuevo.html.twig", array(
                    "form" => $form->createView()
        ));
    }

    public function modificarAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $facultad = $em->getRepository('ProyectoMainBundle:Facultad')->findOneById($id);
        $form = $this->createForm(FacultadType::class, $facultad);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($facultad);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_facultad_homepage'));
        }
        return $this->render("ProyectoMainBundle:Facultad:modificar.html.twig", array(
                    "form" => $form->createView()
        ));
    }

    public function detalleAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $facultad = $em->getRepository('ProyectoMainBundle:Facultad')->findOneById($id);
        $form = $this->createForm(FacultadType::class, $facultad);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('proyecto_$facultad_homepage'));
        }
        return $this->render("ProyectoMainBundle:Facultad:detalle.html.twig", array(
                    'nombre' => $facultad->getNombre(), 'carrera' => $facultad->getCarrera(), 
                    'descripcion' => $facultad->getDescripcion()));
    }
    
    /* MANEJO DE URL: Envio de Datos */

    public function facultadNuevoAction($nombre, $descripcion, $carrera) {
        $facultad = new Facultad();
        $facultad->setNombre($nombre);
        $facultad->setDescripcion($descripcion);
        $facultad->setCarrera($carrera);
        $em = $this->getDoctrine()->getManager();
        $em->persist($facultad);
        $em->flush();
        return $this->render('ProyectoMainBundle:Facultad:nuevo.html.twig', array('nombre' => $nombre, 'descripcion' => $descripcion, 'carrera' => $carrera));
    }

    public function facultadListarAction() {
        $em = $this->getDoctrine()->getManager();
        $facultades = $em->getRepository('ProyectoMainBundle:Facultad')->findAll();
        return $this->render("ProyectoMainBundle:Facultad:listar.html.twig", array("facultades" => $facultades));
    }

    public function facultadDetalleAction($id) {
        $em = $this->getDoctrine()->getManager();
        $facultad = $em->getRepository('ProyectoMainBundle:Facultad')->findOneById($id);
        return $this->render('ProyectoMainBundle:Facultad:modificar.html.twig', array('nombre' => $facultad->getNombre(), 'descripcion' => $facultad->getDescripcion(), 'carrera' => $facultad->getCarrera()));
    }

    public function facultadModificarAction($id, $nombre, $descripcion, $carrera) {
        $em = $this->getDoctrine()->getManager();
        $facultad = $em->getRepository('ProyectoMainBundle:Facultad')->find($id);
        if (!$facultad) {
            return $this->redirect($this->generateUrl('proyecto_facultad_homepage'));
        }
        $facultad->setNombre($nombre);
        $facultad->setDescripcion($descripcion);
        $facultad->setCarrera($carrera);
        $em->flush();
        return $this->render('ProyectoMainBundle:Facultad:modificar.html.twig', array('nombre' => $facultad->getNombre(), 'descripcion' => $facultad->getDescripcion(), 'carrera' => $facultad->getCarrera()));
    }

    public function facultadEliminarAction($id) {
        $em = $this->getDoctrine()->getManager();
        $facultad = $em->getRepository('ProyectoMainBundle:Facultad')->find($id);
        if (!$facultad) {
            return $this->redirect($this->generateUrl('proyecto_facultad_homepage'));
        }
        $em->remove($facultad);
        $em->flush();
        return $this->redirect($this->generateUrl('proyecto_facultad_homepage'));
    }

}
