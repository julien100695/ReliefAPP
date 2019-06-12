<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\Historique;
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
     $Url = new Historique();
     
     $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $Url);
     
     $formBuilder
     ->add('urlText',      TextType::class)
     ->add('save',      SubmitType::class)
     ;
     
     $form = $formBuilder->getForm();
     
     if ($request->isMethod('POST')) { 
         
         $form->handleRequest($request);
         
         // On vérifie que les valeurs entrées sont correctes
         // (Nous verrons la validation des objets en détail dans le prochain chapitre)
         if ($form->isValid()) {
             // On enregistre notre objet $advert dans la base de données, par exemple
             $em = $this->getDoctrine()->getManager();
             $em->persist($Url);
             $em->flush();
             
             $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
             
             // On redirige vers la page de visualisation de l'annonce nouvellement créée
             return $this->redirectToRoute('app_listCurrentHistory');
         }
     }
     
     
     return $this->render('default/saveHistory.html.twig', array(
         'form' => $form->createView(),
     ));
     
     
    }
    
    public function listCurrentHistoryAction(Request $request)
    {
        return $this->render('default/listCurrentHistory.html.twig');
    }
}
