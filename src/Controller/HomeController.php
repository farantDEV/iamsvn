<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
   
    /**
     * @Route("/", name= "index")
     */
	public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('App/index.html.twig');
    }
}
