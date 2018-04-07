<?php

namespace CollocationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity;
class DefaultController extends Controller
{
    public function indexAction()
    { 
        return $this->render('CollocationBundle:Default:index.html.twig');
    }
}
