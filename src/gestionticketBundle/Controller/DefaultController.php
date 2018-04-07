<?php

namespace gestionticketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('gestionticketBundle:Default:index.html.twig');
    }
}
