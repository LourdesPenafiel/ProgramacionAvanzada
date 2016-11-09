<?php

namespace Proyecto\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProyectoMainBundle:Default:index.html.twig');
    }
}
