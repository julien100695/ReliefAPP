<?php

namespace OC\HistoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OCHistoryBundle:Default:index.html.twig');
    }
}
