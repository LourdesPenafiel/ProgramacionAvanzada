<?php

namespace Proyecto\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MedicamentosPorIndicacionesController extends Controller
{
	public function MedicamentoIndicacionNuevoAction($idMedicamento, $idIndicacion)
    {
        return $this->render('ProyectoMainBundle:MedicamentosPorIndicaciones:MedicamentoIndicacionNuevo.html.twig', array('idMedicamento' =>$idMedicamento,'idIndicacion'=>$idIndicacion));
    }

    public function MedicamentoIndicacionEliminarAction($idMedicamento, $idIndicacion)
    {
        return $this->render('ProyectoMainBundle:MedicamentosPorIndicaciones:MedicamentoIndicacionEliminar.html.twig', array('idMedicamento' =>$idMedicamento,'idIndicacion'=>$idIndicacion));
    }
}