<?php

namespace Proyecto\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Proyecto\MainBundle\Entity\Medicamento;
use Proyecto\MainBundle\Form\MedicamentoType;

class MedicamentoController extends Controller
{

     public function nuevoAction(Request $request) {
        $medicamento = new Medicamento();
        $form = $this->createForm(MedicamentoType::class, $medicamento);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medicamento);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_medicamento_nuevo'));
        }
        return $this->render("ProyectoMainBundle:Medicamento:nuevo.html.twig", array(
                    "form" => $form->createView()
        ));
    }


       public function detalleAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $medicamento = $em->getRepository('ProyectoMainBundle:Medicamento')->findOneById($id);
        $form = $this->createForm(MedicamentoType::class, $medicamento);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('proyecto_medicamento_homepage'));
        }
        return $this->render("ProyectoMainBundle:Medicamento:detalle.html.twig", array(
                    'nombre' => $medicamento->getNombre(), 'descripcion' => $medicamento->getDescripcion()));
    }

    public function modificarAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $medicamento = $em->getRepository('ProyectoMainBundle:Medicamento')->findOneById($id);
        $form = $this->createForm(MedicamentoType::class, $medicamento);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medicamento);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_medicamento_homepage'));
        }
        return $this->render("ProyectoMainBundle:Medicamento:modificar.html.twig", array(
                    "form" => $form->createView()
        ));
    }

     public function listarAction(){
        $em = $this->getDoctrine()->getManager();
        $medicamento= $em->getRepository('ProyectoMainBundle:Medicamento')->findAll();
        return $this->render("ProyectoMainBundle:Medicamento:listar.html.twig", array("medicamentos"=>$medicamento));
    }
	
}
