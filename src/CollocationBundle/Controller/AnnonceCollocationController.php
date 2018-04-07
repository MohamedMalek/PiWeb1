<?php

namespace CollocationBundle\Controller;

use AppBundle\Entity\AnnonceCollocation;
use AppBundle\Entity\Uploadimage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * Annoncecollocation controller.
 *
 */
class AnnonceCollocationController extends Controller
{
    /**
     * Lists all annonceCollocation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $annonceCollocations = $em->getRepository('AppBundle:AnnonceCollocation')->findAll();
        $em1 = $this->getDoctrine()->getManager();

        $UploadedImages = $em1->getRepository('AppBundle:Uploadimage')->findAll();

        foreach ($annonceCollocations as$annonceCollocation) {
            $Up=new UploadimageController();
            $Up->getImagesAnnonces($annonceCollocation, $UploadedImages);

        }


        return $this->render('CollocationBundle:annoncecollocation:index.html.twig', array(
            'annonceCollocations' => $annonceCollocations,
        ));
    }

    public function AjaxRechercheAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $annonceCollocations = $em->getRepository('AppBundle:AnnonceCollocation')->FiltredByPrix($request->get('search'));
        $em1 = $this->getDoctrine()->getManager();

        $UploadedImages = $em1->getRepository('AppBundle:Uploadimage')->findAll();

        foreach ($annonceCollocations as$annonceCollocation) {
            $Up=new UploadimageController();
            $Up->getImagesAnnonces($annonceCollocation, $UploadedImages);

        }


        return $this->render('CollocationBundle:annoncecollocation:AnnoncesCollocationAjaxPage.html.twig', array(
            'Annonces' => $annonceCollocations,
        ));
    }


    public function MesAnnoncesAction()
    { if($this->getUser()==null) {
        return $this->redirectToRoute("fos_user_security_login");
    }
        $em = $this->getDoctrine()->getManager();

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $annonceCollocations = $em->getRepository('AppBundle:AnnonceCollocation')->findBy(['idAnnonceur'=>$user->getId()]);
        $em1 = $this->getDoctrine()->getManager();

        $UploadedImages = $em1->getRepository('AppBundle:Uploadimage')->findAll();

        foreach ($annonceCollocations as$annonceCollocation) {
            $Up=new UploadimageController();
            $Up->getImagesAnnonces($annonceCollocation, $UploadedImages);

        }


        return $this->render('CollocationBundle:annoncecollocation:index.html.twig', array(
            'annonceCollocations' => $annonceCollocations,
        ));
    }
    /**
     * Creates a new annonceCollocation entity.
     *
     */
    public function newAction(Request $request)
    {
        $annonceCollocation = new Annoncecollocation();
        $form = $this->createForm('CollocationBundle\Form\AnnonceCollocationType', $annonceCollocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $annonceCollocation->setAdresse($request->get('adresse'));
            $em->persist($annonceCollocation);
            $em->flush();
            $annonceCollocations = $em->getRepository('AppBundle:AnnonceCollocation')->findAll();
            $an=new AnnonceCollocation();
           $lastindex=count($annonceCollocations)-1;
           $an=$annonceCollocations[$lastindex];
    $up = new UploadimageController();
    $up->AddImages($annonceCollocation,$annonceCollocations,$em);


            return $this->redirectToRoute('annoncecollocation_show', array('idAnnonce' => $annonceCollocation->getIdannonce()));
        }

        return $this->render('CollocationBundle:annoncecollocation:new.html.twig', array(
            'annonceCollocation' => $annonceCollocation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a annonceCollocation entity.
     *
     */
    public function showAction(AnnonceCollocation $annonceCollocation)
    {  $em1 = $this->getDoctrine()->getManager();
        $UploadedImages = $em1->getRepository('AppBundle:Uploadimage')->findAll();
        $Up=new UploadimageController();
         $Up->getImagesAnnonce($annonceCollocation, $UploadedImages);


        $deleteForm = $this->createDeleteForm($annonceCollocation);

        return $this->render('CollocationBundle:annoncecollocation:show.html.twig', array(
            'annonceCollocation' => $annonceCollocation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a annonceCollocation entity.
     *
     */
    public function deleteAction(Request $request, AnnonceCollocation $annonceCollocation)
    {
        $form = $this->createDeleteForm($annonceCollocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($annonceCollocation);
            $em->flush();
        }

        return $this->redirectToRoute('annoncecollocation_index');
    }

    /**
     * Displays a form to edit an existing annonceCollocation entity.
     *
     */
    public function editAction(Request $request, AnnonceCollocation $annonceCollocation)
    {
       // var_dump($annonceCollocation);
      //  var_dump($annonceCollocation->getEquipements());



        $deleteForm = $this->createDeleteForm($annonceCollocation);

        $editForm = $this->createForm('CollocationBundle\Form\AnnonceCollocationEditType', $annonceCollocation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid())
        {    $annonceCollocation->setAdresse($request->get('adresse'));
            $annonceCollocation->resetEquipement();
            var_dump($annonceCollocation->getEquipements());
            $annonceCollocation->setEquipements($editForm->get('equipements')->getData());
            var_dump($annonceCollocation->getEquipements());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('annoncecollocation_edit', array('idAnnonce' => $annonceCollocation->getIdannonce()));
        }

        return $this->render('CollocationBundle:annoncecollocation:edit.html.twig', array(
            'annonceCollocation' => $annonceCollocation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to delete a annonceCollocation entity.
     *
     * @param AnnonceCollocation $annonceCollocation The annonceCollocation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnnonceCollocation $annonceCollocation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('annoncecollocation_delete', array('idAnnonce' => $annonceCollocation->getIdannonce())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
