<?php

namespace Olivier\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{

	public function indexAction()
	{
		return $this->render('OlivierNewsBundle:News:index.html.twig', array('name' => 'Olivier'));
	}
}