<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    public function saveHistoryAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Ici, on s'occupera de la cr�ation et de la gestion du formulaire
            
            $this->addFlash('notice', 'Annonce bien enregistr�e.');
            
        }
        return $this->render('default/saveHistory.html.twig');
    }
    
    public function listCurrentHistoryAction(Request $request)
    {
        return $this->render('default/listCurrentHistory.html.twig');
    }
}
