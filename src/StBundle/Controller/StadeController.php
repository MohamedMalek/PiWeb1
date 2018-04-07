<?php

namespace StBundle\Controller;

use AppBundle\Entity\Stade;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Stade controller.
 *
 */
class StadeController extends Controller
{
    /**
     * Lists all stade entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stades = $em->getRepository('AppBundle:Stade')->findAll();

        return $this->render('StBundle:stade:index.html.twig', array(
            'stades' => $stades,
        ));
    }

    /**
     * Creates a new stade entity.
     *
     */
    public function newAction(Request $request)
    {
        $stade = new Stade();
        $form = $this->createForm('StBundle\Form\StadeType', $stade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stade);
            $em->flush();

            return $this->redirectToRoute('stade_show', array('id' => $stade->getId()));
        }

        return $this->render('StBundle:stade:new.html.twig', array(
            'stade' => $stade,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a stade entity.
     *
     */
    public function showAction(Stade $stade)
    {
        $deleteForm = $this->createDeleteForm($stade);

        return $this->render('StBundle:stade:show.html.twig', array(
            'stade' => $stade,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing stade entity.
     *
     */
    public function editAction(Request $request, Stade $stade)
    {
        $deleteForm = $this->createDeleteForm($stade);
        $editForm = $this->createForm('StBundle\Form\StadeType', $stade);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stade_edit', array('id' => $stade->getId()));
        }

        return $this->render('StBundle:stade:edit.html.twig', array(
            'stade' => $stade,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a stade entity.
     *
     */
    public function deleteAction(Request $request, Stade $stade)
    {
        $form = $this->createDeleteForm($stade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stade);
            $em->flush();
        }

        return $this->redirectToRoute('stade_index');
    }

    /**
     * Creates a form to delete a stade entity.
     *
     * @param Stade $stade The stade entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Stade $stade)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stade_delete', array('id' => $stade->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
