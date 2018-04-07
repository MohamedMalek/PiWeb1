<?php

namespace gestionticketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Ticket;
use Symfony\Component\HttpFoundation\Request;
class TicketController extends Controller
{
    /**
     * Lists all ticket entities.
     *
     */
    function  aaAction(){
        return $this->render('gestionticketBundle:Ticket:aaaa.html.twig');
    }
   /* public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tickets = $em->getRepository('gestionticketBundle:Ticket')->findAll();

        return $this->render('ticket/index.html.twig', array(
            'tickets' => $tickets,
        ));
    }*/

    /**
     * Creates a new ticket entity.
     *
     */
    public function newAction(Request $request)
    {
        $ticket = new Ticket();
        $em = $this->getDoctrine()->getManager();
        $matchs= $em->getRepository('AppBundle:Matchs')->findAll();

        //
        if($request->isMethod('post')){
            $ticket->setCategories($request->get('categories'));
            $ticket->setPrix($request->get('prix'));
            $ticket->setNbticket($request->get('nombreticket'));
            $em2 = $this->getDoctrine()->getManager();
            $match= $em2->getRepository('AppBundle:Matchs')->findOneBy(array('idMatch'=>$request->get('match')));

            /*$annonceur = $request->get('id_annonceur');$request->get('idannon')*/
           $annonceur= $em2->getRepository('AppBundle:User')->findOneBy(array('id'=>4));
            $ticket->setIdmatch($match);
            $ticket->setIdAnnonceur($annonceur);
            $ticket->setDateajout(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();
            return $this->redirectToRoute('gestionticket_afficher_ticket');
        }

        return $this->render('gestionticketBundle:Ticket:ajouter.html.twig', array('matchs' => $matchs));
    }


    function afficherAction(){

        $em = $this->getDoctrine()->getManager();
        $matchs= $em->getRepository('AppBundle:Matchs')->findAll();
        $tickets = $em->getRepository("AppBundle:Ticket")->findAll();
        $tickettop5=$em->getRepository('AppBundle:Ticket')->findBy(array(),array('moyenne'=>'DESC'),5);


      return $this->render('gestionticketBundle:Ticket:afficher.html.twig', array('ticketss' => $tickets,'top5'=>$tickettop5,'matchs' => $matchs
            // ...
        ));
    }


    /**
     * Finds and displays a ticket entity.
     *
     *//*
    public function showAction(Ticket $ticket)
    {
        $deleteForm = $this->createDeleteForm($ticket);

        return $this->render('ticket/show.html.twig', array(
            'ticket' => $ticket,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ticket entity.
     *
     */
    public function modifierAction(Request $request, $id)
    {
        $ticket = new Ticket();
        $em = $this->getDoctrine()->getManager();
        $matchs= $em->getRepository('AppBundle:Matchs')->findAll();

        $ticket=$em->getRepository("AppBundle:Ticket")->findOneBy(array('idTicket'=>$id));
        if($request->isMethod('post')){
            $em2 = $this->getDoctrine()->getManager();

            $ticket->setCategories($request->get('categories'));
            $ticket->setPrix($request->get('prix'));
            $ticket->setNbticket($request->get('nombreticket'));
            $ticket->setDateajout(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->merge($ticket);
            $em->flush();
            return $this->redirectToRoute('gestionticket_mestticket');
        }
        return $this->render('gestionticketBundle:Ticket:modifier.html.twig',array('ticketss' => $ticket,'matchs' => $matchs

        ));
    }
    public function supprimerAction($id){
        $em=$this->getDoctrine()->getManager();
        $ticket=$em->getRepository("gestionticketBundle:Ticket")->find($id);
        $em->remove($ticket);
        $em->flush();
        return $this->redirectToRoute('gestionticket_mestticket');


    }


    public function rechercherDQLAction(Request $request)
    {



    }

    public function mestticketAction(){
        $em = $this->getDoctrine()->getManager();
        $ticket = new Ticket();
        $matchs= $em->getRepository('AppBundle:Matchs')->findAll();
        $user=$this->get('security.token_storage')->getToken()->getUser();
        /* $annonceur= $em->getRepository('FosUserBundle:user')->findOneBy(array('id'=>4));*/

         $tickets = $em->getRepository("AppBundle:Ticket")->findBy(array('idAnnonceur'=>$user->getId()));


        return $this->render('gestionticketBundle:Ticket:mesticket.html.twig', array('ticketss' => $tickets,'matchs' => $matchs));
    }
    /**
     * Deletes a ticket entity.
     *
     *//*
    public function deleteAction(Request $request, Ticket $ticket)
    {
        $form = $this->createDeleteForm($ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ticket);
            $em->flush();
        }

        return $this->redirectToRoute('ticket_index');
    }

    /**
     * Creates a form to delete a ticket entity.
     *
     * @param Ticket $ticket The ticket entity
     *
     * @return \Symfony\Component\Form\Form The form
     *//*
    private function createDeleteForm(Ticket $ticket)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ticket_delete', array('idTicket' => $ticket->getIdticket())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }*/
    public function rechercheAjaxdAction(Request $request)
    { $em = $this->getDoctrine()->getManager();

        if ($request->isXmlHttpRequest()) {
            $search = $request->get('search');
            dump($search);

            $repo = $em->getRepository('AppBundle:Ticket');
            $event = $repo->findAjaxd($search);
            return $this->render('gestionticketBundle:Default:aaaa.html.twig', array('events' => $event));
        }

        return $this->render('gestionticketBundle:Ticket:aaaa.html.twig', array());

    }
function reserverAction(Request $request,$id){
    $em = $this->getDoctrine()->getManager();
    $matchs= $em->getRepository('AppBundle:Matchs')->findAll();
    $ticket=$em->getRepository("AppBundle:Ticket")->findOneBy(array('idTicket'=>$id));
    if($request->isMethod('post')) {
        $ticket->setNbticket($ticket->getNbticket()-$request->get('nombreticket'));
        $em = $this->getDoctrine()->getManager();
        $em->merge($ticket);
        $em->flush();
        return $this->redirectToRoute('gestionticket_afficher_ticket');
    }
    return $this->render('gestionticketBundle:Ticket:reserver.html.twig', array('ticketss' => $ticket,'matchs' => $matchs
        // ...
    ));

}



}
