<?php

namespace App\Controller;

use App\Form\MessageType;
use App\Entity\Message;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
   
    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $session = new Session();
		$message = new message();
		$form = $this->get('form.factory')->create(MessageType::class, $message);
		
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			
			$em 			= $this->getDoctrine()->getManager();
			$em->persist($message);
            $em->flush();
			
			$session->getFlashBag()->add('success', 'Votre message à bien été envoyé');
			$session->clear();
			
			return $this->redirectToRoute('message_view');
		}
		
		
		return $this->render('App/index.html.twig', ['form' => $form->createView()] );
    }
	
	/**
     * @Route("/messages", name="message_view")
     */
    public function messageViewAction(Request $request)
    {
		$repository = $this->getDoctrine()->getRepository(Message::class);
		$message = new Message;
		$messages = $repository->findAll();
		/*
		* messages display
		*/
		foreach ($messages as $message){
			$message->getId();
			$message->getName();
			$message->getContent();
			
		}
		
		return $this->render('Messages/index.html.twig', ['messages' => $messages,] );
    }
}
