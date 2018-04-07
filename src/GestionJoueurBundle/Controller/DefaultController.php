<?php

namespace GestionJoueurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionJoueurBundle:Default:index.html.twig');
    }

    public function afficherJoueurEquipeAction($id)
    {
        //DQLAfficher
        $EM=  $this->getDoctrine()->getManager();
        // $Joueur = new Joueur();
        $Joueurs=$EM->getRepository("AppBundle:Joueur")->DQLAfficher($id);
        return $this->render('GestionJoueurBundle:Joueur:AfficherJoueurEquipe.html.twig', array(
            'Joueurs'=>$Joueurs
            // ...
        ));
    }
}
