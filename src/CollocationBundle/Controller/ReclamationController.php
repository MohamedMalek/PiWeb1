<?php

namespace CollocationBundle\Controller;

use AppBundle\Entity\Reclamation;
use AppBundle\Entity\AnnonceCollocation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reclamation controller.
 *
 */
class ReclamationController extends Controller
{
    /**
     * Lists all reclamation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reclamations = $em->getRepository('AppBundle:Reclamation')->GetReclamedList();

        return $this->render('CollocationBundle:reclamation:index.html.twig', array(
            'reclamations' => $reclamations,
        ));
    }

    /**
     * Creates a new reclamation entity.
     *
     */
    public function newAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $reclamation = new Reclamation();
        $form = $this->createForm('CollocationBundle\Form\ReclamationType', $reclamation);
        $form->handleRequest($request);
        $annonce = $em->getRepository('AppBundle:AnnonceCollocation')->find($id);

        if ($form->isSubmitted() && $form->isValid()) {
            $reclamation->setIdAnnonce($annonce);
            $reclamation->setIdUser($this->container->get('security.token_storage')->getToken()->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

//            return $this->redirectToRoute('reclamation_show', array('id' => $reclamation->getId()));
        }

        return $this->render('CollocationBundle:reclamation:new.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reclamation entity.
     *
     */
    public function showAction(Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);

        return $this->render('CollocationBundle:reclamation:show.html.twig', array(
            'reclamation' => $reclamation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reclamation entity.
     *
     */
    public function editAction(Request $request, Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);
        $editForm = $this->createForm('CollocationBundle\Form\ReclamationType', $reclamation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reclamation_edit', array('id' => $reclamation->getId()));
        }

        return $this->render('CollocationBundle:reclamation:edit.html.twig', array(
            'reclamation' => $reclamation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reclamation entity.
     *
     */
    public function deleteAction(Request $request, Reclamation $reclamation)
    {
        $form = $this->createDeleteForm($reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reclamation);
            $em->flush();
        }

        return $this->redirectToRoute('reclamation_index');
    }

    public function deleteAnnonceAction($idAnnonce,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("AppBundle:Reclamation")->find($id);
        $em->remove($Rec);
        $em->flush();
        $Annonce = $em->getRepository("AppBundle:AnnonceCollocation")->find($idAnnonce);
        $em->remove($Annonce);
        $em->flush();

        return $this->redirectToRoute('reclamation_index');

    }
    public function RestituerAnnonceAction($idAnnonce,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $Rec = $em->getRepository("AppBundle:Reclamation")->find($id);
        $em->remove($Rec);
        $em->flush();
        $Annonce = $em->getRepository("AppBundle:AnnonceCollocation")->find($idAnnonce);
        $Annonce->setIsBlackListed(0);
        $em->persist($Annonce);
        $em->flush();
        return $this->redirectToRoute('reclamation_index');
    }
    public function GoToBlackListAnnonceAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reclamations = $em->getRepository('AppBundle:Reclamation')->GetBlackList();

        return $this->render('CollocationBundle:reclamation:index.html.twig', array(
            'reclamations' => $reclamations,
        ));

    }

    public function BlackListerAnnonceAction($idAnnonce,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $Annonce = $em->getRepository("AppBundle:AnnonceCollocation")->find($idAnnonce);
        $Annonce->setIsBlackListed(1);
        $em->persist($Annonce);
        $em->flush();
        return $this->redirectToRoute('reclamation_index');

    }


    /**
     * Creates a form to delete a reclamation entity.
     *
     * @param Reclamation $reclamation The reclamation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reclamation $reclamation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reclamation_delete', array('id' => $reclamation->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
