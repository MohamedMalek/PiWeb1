<?php

namespace gestionticketBundle\Controller;

use AppBundle\Entity\Abonnement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class AbonnementController extends Controller
{
    public function newAbAction(Request $request)
    {
        $abonnement = new Abonnement();
        $em = $this->getDoctrine()->getManager();

        //
        if($request->isMethod('post')){
            $abonnement->setCategorie($request->get('categories'));
            $abonnement->setPrix($request->get('prix'));
            $abonnement->setNbrabonnement($request->get('nombreabonnement'));
            $abonnement->setName($request->get('name'));
            $abonnement->setType($request->get('type'));
            $em2 = $this->getDoctrine()->getManager();

            $annonceur= $em2->getRepository('gestionticketBundle:FosUser')->findOneBy(array('id'=>4));

            $abonnement->setIduser($annonceur);
            $abonnement->setDatedajout(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonnement);
            $em->flush();
            return $this->redirectToRoute('gestionticket_afficher_abonnement');
        }

        return $this->render('gestionticketBundle:abonnement:ajouterAb.html.twig');
    }

    function afficherAbAction(){

        $em = $this->getDoctrine()->getManager();

        $abonnement = $em->getRepository("gestionticketBundle:Abonnement")->findAll();
        $matchs= $em->getRepository('gestionticketBundle:Matchs')->findAll();


        return $this->render('gestionticketBundle:abonnement:afficherAb.html.twig', array('abonnements' => $abonnement,'matchs' => $matchs));
    }


    public function modifierAbAction(Request $request,$id)
    {
        $abonnement = new Abonnement();
        $em = $this->getDoctrine()->getManager();

        $abonnement=$em->getRepository("gestionticketBundle:Abonnement")->findOneBy(array('id'=>$id));
        if($request->isMethod('post')){
            $abonnement->setCategorie($request->get('categories'));
            $abonnement->setPrix($request->get('prix'));
            $abonnement->setNbrabonnement($request->get('nombreabonnement'));
            $abonnement->setName($request->get('name'));
            $abonnement->setType($request->get('type'));

            $abonnement->setDatedajout(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonnement);
            $em->flush();
            return $this->redirectToRoute('gestionticket_afficher_abonnement');
        }
        return $this->render('gestionticketBundle:abonnement:modifierAb.html.twig',array('abonnements' => $abonnement

        ));
    }
    public function supprimerAbAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $abonnement=$em->getRepository("gestionticketBundle:Abonnement")->find($id);
        $em->remove($abonnement);
        $em->flush();
        return $this->redirectToRoute('gestionticket_afficher_abonnement');
    }

    function  aaAction(){
        return $this->render('gestionticketBundle:abonnement:affichertest.html.twig');
    }
    function reserverAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();

        $abonnement=$em->getRepository("gestionticketBundle:Abonnement")->findOneBy(array('id'=>$id));
        if($request->isMethod('post')) {
            $abonnement->setNbticket($abonnement->getNbticket()-$request->get('nombreabonnement'));
            $em = $this->getDoctrine()->getManager();
            $em->merge($abonnement);
            $em->flush();
            return $this->redirectToRoute('gestionticket_afficher_abonnement');
        }
        return $this->render('gestionticketBundle:Default:reserverAb.html.twig', array('abonnements' => $abonnement
            // ...
        ));

    }
}
