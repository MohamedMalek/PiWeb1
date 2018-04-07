<?php

namespace GestionEquipeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('GestionEquipeBundle:Default:index.html.twig');
    }
}
