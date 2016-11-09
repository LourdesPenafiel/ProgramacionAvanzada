<?php

namespace Proyecto\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PadecerController extends Controller
{
	public function nuevoPadecerAction($idEstudiante, $idEnfermedad)
    {
        return $this->render('ProyectoMainBundle:Padecer:nuevoP.html.twig', array('idEstudiante' =>$idEstudiante,'idEnfermedad'=>$idEnfermedad));
    }

    public function eliminarPadecerAction($idEstudiante, $idEnfermedad)
    {
        return $this->render('ProyectoMainBundle:Padecer:eliminarP.html.twig', array('idEstudiante' =>$idEstudiante,'idEnfermedad'=>$idEnfermedad));
    }
}