<?php

namespace GestionEquipeBundle\Controller;

use AppBundle\Entity\Equipe;
use GestionEquipeBundle\Form\EquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class EquipeController extends Controller
{
    public function ajouterEquipeAction(Request $request)
    {
        $equipe= new Equipe();
        if($request->isMethod("post")) {

            $equipe->setPays($request->get("pays"));
            $equipe->setEtat($request->get("etat"));
            $equipe->setGroupe($request->get("groupe"));
            $equipe->setPhase($request->get("phase"));
            $equipe->setPoint($request->get("point"));
            $equipe->setSelecteur($request->get("selecteur"));
            $equipe->setLiendrapeau($request->get("liendrapeau"));
            $EM = $this->getDoctrine()->getManager();
            $EM->persist($equipe);

            $EM->flush();


           // return $this->redirectToRoute('');
        }
        //  echo "test 2";
        return $this->render('GestionEquipeBundle:Equipe:ajouter.html.twig', array(

            // ...
        ));


    }
    public function updateDQLAction($ids,$pays,$etat,$phase,$groupe,$sel,$lien)
    {
        $EM= $this->getDoctrine()->getManager();
      //  $equipe= new Equipe();

        $EM->getRepository("AppBundle:Equipe")->DQLUpdate($ids,$pays,$etat,$phase,$groupe,$sel,$lien);
     //   return $this->redirectToRoute('etudiant_index');
    }

    public function modifierEquipeAction($id,Request $request)
    {

        $EM = $this->getDoctrine()->getManager();
        $equipe=  $EM->getRepository("AppBundle:Equipe")->find($id);

        $form = $this->createForm(\GestionEquipeBundle\Form\EquipeType::class, $equipe);
        $form->handleRequest($request);
        if ($form->isValid()) {

            $EM->flush();
        }
            return $this->render('GestionEquipeBundle:Equipe:base.html.twig', array(
                'form'=>$form->createView()
                // ...
            ));


            // return $this->redirectToRoute('');
        }


    public function supprimerEquipeAction($id)
    {
        $EM = $this->getDoctrine()->getManager();
        $equipe=  $EM->getRepository("AppBundle:Equipe")->find($id);
        $EM->remove($equipe);
        $EM->flush();
        return $this->redirectToRoute('AfficherEquipe');
    }

    public function afficherEquipeAction()
    {
        $EM=$this->getDoctrine()->getManager();
        $Equipes=$EM->getRepository("AppBundle:Equipe")->findAll();

        return $this->render('GestionEquipeBundle:Equipe:afficher.html.twig', array(
            'Equipes'=>$Equipes
            // ...
        ));
    }


    public function afficherEquipeAdminAction()
    {
        $EM=$this->getDoctrine()->getManager();
        $Equipes=$EM->getRepository("AppBundle:Equipe")->findAll();

        return $this->render('GestionEquipeBundle:Equipe:afficheradmin.html.twig', array(
            'Equipes'=>$Equipes
            // ...
        ));
    }


}
