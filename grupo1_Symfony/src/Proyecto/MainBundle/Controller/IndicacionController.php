<?php

namespace Proyecto\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Proyecto\MainBundle\Entity\Indicaciones;
use Proyecto\MainBundle\Form\IndicacionesType;


class IndicacionController extends Controller
{

     public function nuevoAction(Request $request) {
        $indicacion = new Indicaciones();
        $form = $this->createForm(IndicacionesType::class, $indicacion);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($indicacion);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_indicaciones_nuevo'));
        }
        return $this->render("ProyectoMainBundle:Indicacion:nuevo.html.twig", array(
                    "form" => $form->createView()
        ));
    }


     public function detalleAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $indicacion = $em->getRepository('ProyectoMainBundle:Indicaciones')->findOneById($id);
        $form = $this->createForm(IndicacionesType::class, $indicacion);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('proyecto_indicaciones_homepage'));
        }
        return $this->render("ProyectoMainBundle:Indicacion:detalle.html.twig", array(
                    'descripcion' => $indicacion->getDescripcion()));
    }

      public function modificarAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $indicacion = $em->getRepository('ProyectoMainBundle:Indicaciones')->findOneById($id);
        $form = $this->createForm(IndicacionesType::class, $indicacion);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($indicacion);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_indicaciones_listar'));
        }
        return $this->render("ProyectoMainBundle:Indicacion:modificar.html.twig", array(
                    "form" => $form->createView()
        ));
    }

 
	

     public function listarAction(){
        $em = $this->getDoctrine()->getManager();
        $indicacion= $em->getRepository('ProyectoMainBundle:Indicaciones')->findAll();
        return $this->render("ProyectoMainBundle:Indicacion:listar.html.twig", array("indicaciones"=>$indicacion));
    }
    
   

  public function eliminarAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $indicacion = $em->getRepository('ProyectoMainBundle:Indicaciones')->findOneById($id);
        $form = $this->createForm(IndicacionesType::class, $indicacion);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($indicacion);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_indicaciones_homepage'));
        }
        return $this->render("ProyectoMainBundle:Indicacion:eliminar.html.twig", array(
                    "form" => $form->createView()
        ));
    }

  
}