<?php

namespace Tools\LookingForJobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ToolsLookingForJobBundle:Default:index.html.twig');
    }
}
