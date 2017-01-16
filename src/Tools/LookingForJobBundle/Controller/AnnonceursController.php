<?php

namespace Tools\LookingForJobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Tools\LookingForJobBundle\Entity\Annonceur;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AnnonceursController extends Controller
{
    public function indexAction()
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('ToolsLookingForJobBundle:Annonceur');
        $liste_annonceurs=$repository->findAll();
        return $this->render('ToolsLookingForJobBundle::listeannonceurs.html.twig', array('ListeAnnonceurs'=>$liste_annonceurs));
    }

    public function ficheannonceurAction($id)
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('ToolsLookingForJobBundle:Annonceur');
        $fiche_annonceur=$repository->find($id);

        return $this->render('ToolsLookingForJobBundle::ficheannonceur.html.twig', 
            array('annonceur'=>$fiche_annonceur));
    }

    public function addannonceurAction(Request $request)
    {
        $annonceur = new Annonceur();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $annonceur);
        $formBuilder
            ->add('Entreprise', TextType::class)
            ->add('url', TextType::class, array('required'=>false))
            ->add('contact_nom_prenom', TextType::class, array('required'=>false))
            ->add('contact_email', TextType::class, array('required'=>false))
            ->add('contact_fixe', TextType::class, array('required'=>false))
            ->add('contact_portable', TextType::class, array('required'=>false))
            ->add('presentation', TextareaType::class)
            ->add('commentaires', TextareaType::class, array('required' => false))
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($annonceur);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Annonceur bien enregistrée.');
                return $this->redirectToRoute('tools_looking_for_job_ficheannonceur', array('id'=>$annonceur->getId()));                
            }
        }
        return $this->render('ToolsLookingForJobBundle::formannonceur.html.twig', array('form' => $form->createView(),));

    }

    public function editannonceurAction(Request $request, $id)
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('ToolsLookingForJobBundle:Annonceur');
        $annonceur=$repository->find($id);

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $annonceur);
        $formBuilder
            ->add('Entreprise', TextType::class)
            ->add('url', TextType::class, array('required'=>false))
            ->add('contact_nom_prenom', TextType::class, array('required'=>false))
            ->add('contact_email', TextType::class, array('required'=>false))
            ->add('contact_fixe', TextType::class, array('required'=>false))
            ->add('contact_portable', TextType::class, array('required'=>false))
            ->add('presentation', TextareaType::class)
            ->add('commentaires', TextareaType::class, array('required' => false))
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($annonceur);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Annonceur bien enregistrée.');
                return $this->redirectToRoute('tools_looking_for_job_ficheannonceur', array('id'=>$annonceur->getId()));                
            }
        }
        return $this->render('ToolsLookingForJobBundle::formannonceur.html.twig', array('form' => $form->createView(),));
    }

    public function delannonceurAction(Annonceur $annonceur)
    {
        $em = $this
          ->getDoctrine()
          ->getManager();
        $em->remove($annonceur);
        $em->flush();
        return $this->redirectToRoute('tools_looking_for_job_listeannonceurs');                
    }
}