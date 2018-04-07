<?php

namespace GestionJoueurBundle\Controller;

use AppBundle\Entity\Joueur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class JoueurController extends Controller
{


    public function afficherJoueurParEquipeAction($id)
    {
        $EM=  $this->getDoctrine()->getManager();
        $Joueurs=$EM->getRepository("AppBundle:Joueur")->DQLAfficher($id);
        return $this->render('GestionJoueurBundle:Joueur:AfficherJoueurParEquipe.html.twig', array(
            'Joueurs'=>$Joueurs
            // ...
        ));
    }

    public function afficherJoueurEquipeAction($id)
    {
        $EM=  $this->getDoctrine()->getManager();
        $Joueurs=$EM->getRepository("AppBundle:Joueur")->DQLAfficher($id);
        return $this->render('GestionJoueurBundle:Joueur:AfficherJoueurEquipe.html.twig', array(
            'Joueurs'=>$Joueurs
            // ...
        ));
    }



    public function modifierJoueurAction($id,Request $request)
    {

        $deleteForm = $this->createDeleteForm($joueur);
        $editForm = $this->createForm('AppBundle\Form\JoueurType', $joueur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('joueur_edit', array('idJoueur' => $joueur->getIdjoueur()));
        }

        return $this->render('joueur/edit.html.twig', array(
            'joueur' => $joueur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));

    }


    public function supprimerJoueureAction($id)
    {
        $EM = $this->getDoctrine()->getManager();
        $Joueur=  $EM->getRepository("AppBundle:Joueur")->find($id);
        $EM->remove($Joueur);
        $EM->flush();
        return $this->redirectToRoute('AfficherJoueur');
    }

    public function afficherJoueurAction()
    {
        $EM=$this->getDoctrine()->getManager();
        $Joueurs=$EM->getRepository("AppBundle:Joueur")->findAll();

        return $this->render('GestionJoueurBundle:Joueur:afficher.html.twig', array(
            'Joueurs'=>$Joueurs
            // ...
        ));
    }

//////////////////////////////


    public function ajouterJoueurAction(Request $request)
    {
        $joueur = new Joueur();
        $form = $this->createForm('GestionJoueurBundle\Form\JoueurType', $joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($joueur);
            $em->flush();

           // return $this->redirectToRoute('joueur_show', array('idJoueur' => $joueur->getIdjoueur()));
        }

        return $this->render('GestionJoueurBundle:Joueur:new.html.twig', array(
            'joueur' => $joueur,
            'form' => $form->createView(),
        ));
    }


    public function showAction(Joueur $joueur)
    {
        $deleteForm = $this->createDeleteForm($joueur);

        return $this->render('joueur/show.html.twig', array(
            'joueur' => $joueur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing joueur entity.
     *
     */
    public function editAction(Request $request, Joueur $joueur)
    {
        $deleteForm = $this->createDeleteForm($joueur);
        $editForm = $this->createForm('AppBundle\Form\JoueurType', $joueur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('joueur_edit', array('idJoueur' => $joueur->getIdjoueur()));
        }

        return $this->render('joueur/edit.html.twig', array(
            'joueur' => $joueur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a joueur entity.
     *
     */
    public function deleteAction(Request $request, Joueur $joueur)
    {
        $form = $this->createDeleteForm($joueur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($joueur);
            $em->flush();
        }

        return $this->redirectToRoute('joueur_index');
    }

    /**
     * Creates a form to delete a joueur entity.
     *
     * @param Joueur $joueur The joueur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Joueur $joueur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('joueur_delete', array('idJoueur' => $joueur->getIdjoueur())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


}
