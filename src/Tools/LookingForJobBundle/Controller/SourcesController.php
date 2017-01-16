<?php

namespace Tools\LookingForJobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Tools\LookingForJobBundle\Entity\Source;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SourcesController extends Controller
{
    public function indexAction()
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('ToolsLookingForJobBundle:Source');
        $liste_sources=$repository->findAll();
        return $this->render('ToolsLookingForJobBundle::listesources.html.twig', array('ListeSources'=>$liste_sources));
    }

    public function fichesourceAction($id)
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('ToolsLookingForJobBundle:Source');
        $fiche_source=$repository->find($id);

        return $this->render('ToolsLookingForJobBundle::fichesource.html.twig', 
            array('source'=>$fiche_source));
    }

    public function addsourceAction(Request $request)
    {
        $source = new Source();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $source);
        $formBuilder
            ->add('nom', TextType::class)
            ->add('url', TextType::class, array('required'=>false))
            ->add('cv_document', CheckboxType::class, array('required'=>false))
            ->add('cv_formulaire', CheckboxType::class, array('required'=>false))
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($source);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Source bien enregistrée.');
                return $this->redirectToRoute('tools_looking_for_job_fichesource', array('id'=>$source->getId()));                
            }
        }
        return $this->render('ToolsLookingForJobBundle::formsource.html.twig', array('form' => $form->createView(),));
    }

    public function editsourceAction(Request $request, $id)
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('ToolsLookingForJobBundle:Source');
        $source=$repository->find($id);

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $source);
        $formBuilder
            ->add('nom', TextType::class)
            ->add('url', TextType::class, array('required'=>false))
            ->add('cv_document', CheckboxType::class, array('required'=>false))
            ->add('cv_formulaire', CheckboxType::class, array('required'=>false))
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($source);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Source bien enregistrée.');
                return $this->redirectToRoute('tools_looking_for_job_fichesource', array('id'=>$source->getId()));                
            }
        }
        return $this->render('ToolsLookingForJobBundle::formsource.html.twig', array('form' => $form->createView(),));
    }

    public function delsourceAction(Source $source)
    {
        $em = $this
          ->getDoctrine()
          ->getManager();
        $em->remove($source);
        $em->flush();
        return $this->redirectToRoute('tools_looking_for_job_listesources');                
    }
}
