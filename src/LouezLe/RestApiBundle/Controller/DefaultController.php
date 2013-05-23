<?php

namespace LouezLe\RestApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('LouezLeRestApiBundle:Default:index.html.twig', array('name' => $name));
    }
}
