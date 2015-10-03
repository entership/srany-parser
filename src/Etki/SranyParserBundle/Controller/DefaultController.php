<?php

namespace Etki\SranyParserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {

        return $this->render('EtkiSranyParserBundle:Default:index.html.twig', array('name' => $name));
    }
}
