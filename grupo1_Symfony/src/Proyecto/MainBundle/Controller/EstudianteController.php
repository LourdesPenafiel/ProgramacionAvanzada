<?php

namespace Proyecto\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Proyecto\MainBundle\Entity\Estudiante;
use Proyecto\MainBundle\Form\EstudianteType;

class EstudianteController extends Controller {
    /* MANEJO DE FORMULARIOS: Envio de Datos */

    public function nuevoAction(Request $request) {
        $estudiante = new Estudiante();
        $form = $this->createForm(EstudianteType::class, $estudiante);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estudiante);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_estudiante_nuevo'));
        }
        return $this->render("ProyectoMainBundle:Estudiante:nuevo.html.twig", array(
                    "form" => $form->createView()
        ));
    }

    public function modificarAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository('ProyectoMainBundle:Estudiante')->findOneById($id);
        $form = $this->createForm(EstudianteType::class, $estudiante);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estudiante);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_estudiante_homepage'));
        }
        return $this->render("ProyectoMainBundle:Estudiante:modificar.html.twig", array(
                    "form" => $form->createView()
        ));
    }

    public function detalleAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository('ProyectoMainBundle:Estudiante')->findOneById($id);
        $form = $this->createForm(EstudianteType::class, $estudiante);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('proyecto_estudiante_homepage'));
        }
        return $this->render("ProyectoMainBundle:Estudiante:detalle.html.twig", array(
                    'nombres' => $estudiante->getNombres(), 'apellidos' => $estudiante->getApellidos(), 
                    'correo' => $estudiante->getCorreo(), 'fechadenacimiento' => $estudiante->getFechadenacimiento(), 
                    'direccion' => $estudiante->getDireccion(), 'telefono' => $estudiante->gettelefono(),
                    'facultad'=>$estudiante->getFacultad()));
    }

    public function eliminarAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository('ProyectoMainBundle:Estudiante')->findOneById($id);
        $form = $this->createForm(EstudianteType::class, $estudiante);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estudiante);
            $em->flush();
            return $this->redirect($this->generateUrl('proyecto_estudiante_homepage'));
        }
        return $this->render("ProyectoMainBundle:Estudiante:eliminar.html.twig", array(
                    "form" => $form->createView()
        ));
    }

    public function listarAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository('ProyectoMainBundle:Estudiante')->findAll();
        $form = $this->createForm(EstudianteType::class, $estudiante);
        $form->handleRequest($request);
        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('proyecto_estudiante_homepage'));
        }
            return $this->render('ProyectoMainBundle:Estudiante:listar.html.twig', array('estudiantes' => $estudiantes));

    }



    /* public function estudianteEliminarAction(Request $request, $id){
        $defaultData = array('id' => 'Introduce el id');
         $form = $this->createForm(EstudianteType::class, $estudiante);
         $form = $this->createForm(EstudianteType::class, $estudiante);
         $form->handleRequest($request);

            if ($request->isMethod('POST')) {
            $form->bind($request);
      // data es un arreglo con la clave id
            $data = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $estudiante = $em->getRepository('ProyectoMainBundle:Estudiante')->find($data['id']);

            if (!$estudiante) {
            throw $this->createNotFoundException('Estudiante inexistente para el id '.$id);
            }else{
             $em->remove($estudiante);
             $em->flush();
            return new Response('Estudiante Eliminado...');
      }
    }
        return $this->render("ProyectoMainBundle:Estudiante:eliminar.html.twig", array(
                    "form" => $form->createView()));
  }*/

    /* MANEJO DE URL: Envio de Datos */

    public function estudianteNuevoAction($nombres, $apellidos, $correo, $fechanacimiento, $direccion, $telefono, $Facultad) {
        $estudiante = new Estudiante();
        $estudiante->setNombres($nombres);
        $estudiante->setApellidos($apellidos);
        $estudiante->setCorreo($correo);
        $estudiante->setFechadenacimiento($fechanacimiento);
        $estudiante->setDireccion($direccion);
        $estudiante->setTelefono($telefono);
        $estudiante->setFacultad($Facultad);
        $em = $this->getDoctrine()->getManager();
        $em->persist($estudiante);
        $em->flush();
        return $this->render('ProyectoMainBundle:Estudiante:nuevo.html.twig', array('nombres' => $nombres, 'apellidos' => $apellidos, 'correo' => $correo, 'fechanacimiento' => $fechanacimiento, 'direccion' => $direccion, 'telefono' => $telefono));
    }

   /* public function estudianteListartAction() {
        $em = $this->getDoctrine()->getManager();
        $estudiantes = $em->getRepository('ProyectoMainBundle:Estudiante')->findAll();
        return $this->render("ProyectoMainBundle:Estudiante:listar.html.twig", array("estudiantes" => $estudiantes));
    }*/

    public function estudianteDetalleAction($id) {
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository('ProyectoMainBundle:Estudiante')->findOneById($id);
        return $this->render('ProyectoMainBundle:Estudiante:modificar.html.twig', array('nombres' => $estudiante->getNombres(), 'apellidos' => $estudiante->getApellidos(), 'correo' => $estudiante->getCorreo(), 'fechanacimiento' => $estudiante->getFechanacimiento(), 'direccion' => $estudiante->getDireccion(), 'telefono' => $estudiante->gettelefono()));
    }

    public function estudianteModificarAction($id, $nombres, $apellidos, $correo, $fechanacimiento, $direccion, $telefono, $idFacultadFK) {
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository('ProyectoMainBundle:Estudiante')->find($id);
        if (!$estudiante) {
            return $this->redirect($this->generateUrl('proyecto_estudiante_homepage'));
        }
        $estudiante->setNombres($nombres);
        $estudiante->setApellidos($apellidos);
        $estudiante->setCorreo($correo);
        $estudiante->setfechanacimiento($fechanacimiento);
        $estudiante->setDireccion($direccion);
        $estudiante->setTelefono($telefono);
        $estudiante->setIdFacultadFK($idFacultadFK);
        $em->flush();
        return $this->render('ProyectoMainBundle:Estudiante:modificar.html.twig', array('nombres' => $estudiante->getNombres(), 'apellidos' => $estudiante->getApellidos(), 'correo' => $estudiante->getCorreo(), 'fechanacimiento' => $estudiante->getFechanacimiento(), 'direccion' => $estudiante->getDireccion(), 'telefono' => $estudiante->gettelefono()));
    }

   /* public function estudianteEliminarAction($id) {
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository('ProyectoMainBundle:Estudiante')->find($id);
        if (!$estudiante) {
            return $this->redirect($this->generateUrl('proyecto_estudiante_homepage'));
        }
        $em->remove($estudiante);
        $em->flush();
   */

}
