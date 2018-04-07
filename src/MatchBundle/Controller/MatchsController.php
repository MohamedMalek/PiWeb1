<?php

namespace MatchBundle\Controller;

use AppBundle\Entity\Matchs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Match controller.
 *
 */
class MatchsController extends Controller
{
    /**
     * Lists all match entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $matchs = $em->getRepository('AppBundle:Matchs')->findAll();

        return $this->render('MatchBundle:matchs:index.html.twig', array(
            'matchs' => $matchs,
        ));
    }

    /**
     * Creates a new match entity.
     *
     */
    public function newAction(Request $request)
    {
        $match = new Matchs();
        $form = $this->createForm('MatchBundle\Form\MatchsType', $match);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($match);
            $em->flush();

            return $this->redirectToRoute('matchs_show', array('idMatch' => $match->getIdmatch()));
        }

        return $this->render('MatchBundle:matchs:new.html.twig', array(
            'match' => $match,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a match entity.
     *
     */
    public function showAction(Matchs $match)
    {
        $deleteForm = $this->createDeleteForm($match);

        return $this->render('MatchBundle:matchs:show.html.twig', array(
            'match' => $match,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing match entity.
     *
     */
    public function editAction(Request $request, Matchs $match)
    {
        $deleteForm = $this->createDeleteForm($match);
        $editForm = $this->createForm('MatchBundle\Form\MatchsType', $match);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('matchs_edit', array('idMatch' => $match->getIdmatch()));
        }

        return $this->render('MatchBundle:matchs:edit.html.twig', array(
            'match' => $match,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a match entity.
     *
     */
    public function deleteAction(Request $request, Matchs $match)
    {
        $form = $this->createDeleteForm($match);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($match);
            $em->flush();
        }

        return $this->redirectToRoute('matchs_index');
    }

    /**
     * Creates a form to delete a match entity.
     *
     * @param Matchs $match The match entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Matchs $match)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('matchs_delete', array('idMatch' => $match->getIdmatch())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
