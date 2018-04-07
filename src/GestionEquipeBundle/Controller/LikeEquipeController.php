<?php

namespace GestionEquipeBundle\Controller;

use AppBundle\Entity\LikeEquipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Likeequipe controller.
 *
 */
class LikeEquipeController extends Controller
{
    /**
     * Lists all likeEquipe entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $likeEquipes = $em->getRepository('AppBundle:LikeEquipe')->findAll();

        return $this->render('GestionEquipeBundle:likeequipe:index.html.twig', array(
            'likeEquipes' => $likeEquipes,
        ));
    }

    /**
     * Creates a new likeEquipe entity.
     *
     */
    public function newAction(Request $request)
    {
        $likeEquipe = new Likeequipe();
        $form = $this->createForm('GestionEquipeBundle\Form\LikeEquipeType', $likeEquipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($likeEquipe);
            $em->flush();

            return $this->redirectToRoute('likeequipe_show', array('idLike' => $likeEquipe->getIdlike()));
        }

        return $this->render('GestionEquipeBundle:likeequipe:new.html.twig', array(
            'likeEquipe' => $likeEquipe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a likeEquipe entity.
     *
     */
    public function showAction(LikeEquipe $likeEquipe)
    {
        $deleteForm = $this->createDeleteForm($likeEquipe);

        return $this->render('GestionEquipeBundle:likeequipe:show.html.twig', array(
            'likeEquipe' => $likeEquipe,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing likeEquipe entity.
     *
     */
    public function editAction(Request $request, LikeEquipe $likeEquipe)
    {
        $deleteForm = $this->createDeleteForm($likeEquipe);
        $editForm = $this->createForm('GestionEquipeBundle\Form\LikeEquipeType', $likeEquipe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('likeequipe_edit', array('idLike' => $likeEquipe->getIdlike()));
        }

        return $this->render('GestionEquipeBundle:likeequipe:edit.html.twig', array(
            'likeEquipe' => $likeEquipe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a likeEquipe entity.
     *
     */
    public function deleteAction(Request $request, LikeEquipe $likeEquipe)
    {
        $form = $this->createDeleteForm($likeEquipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($likeEquipe);
            $em->flush();
        }

        return $this->redirectToRoute('likeequipe_index');
    }

    /**
     * Creates a form to delete a likeEquipe entity.
     *
     * @param LikeEquipe $likeEquipe The likeEquipe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LikeEquipe $likeEquipe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('likeequipe_delete', array('idLike' => $likeEquipe->getIdlike())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
