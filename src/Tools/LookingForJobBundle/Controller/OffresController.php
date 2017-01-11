<?php

namespace Tools\LookingForJobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Tools\LookingForJobBundle\Entity\Offre;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OffresController extends Controller
{

    const ALLARRAY = -10 ;

    public function indexAction()
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('ToolsLookingForJobBundle:Offre');
        $liste_offres=$repository->findAll();
        return $this->render('ToolsLookingForJobBundle::listeoffres.html.twig', array('ListeOffres'=>$liste_offres));
    }

    public function ficheoffreAction($id)
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('ToolsLookingForJobBundle:Offre');
        $fiche_offre=$repository->find($id);
        $stringitems = array(
            'metier'=>$this->getMetier($fiche_offre->getMetier()),
            'statut'=>$this->getStatus($fiche_offre->getStatut())
            );

        return $this->render('ToolsLookingForJobBundle::ficheoffre.html.twig', 
            array('offre'=>$fiche_offre, 'stringitems'=>$stringitems));
    }

    public function addoffreAction(Request $request)
    {
        // L'objet Offre
        $offre = new Offre();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $offre);
        $formBuilder
            ->add('titre', TextType::class)
            ->add('url', TextType::class, array('required'=>false))
            ->add('contact', TextareaType::class, array('required'=>false))
            ->add('texte', TextareaType::class)
            ->add('date_publication', DateType::class)
            ->add('date_dernier_contact', DateType::class)
            ->add('commentaires', TextareaType::class, array('required' => false))
            ->add('metier', ChoiceType::class, array(
                'choices'=>array(
                    'N\'importe quoi'=>0,
                    'Numérisation 3D'=>1,
                    'Développement web'=>2,
                    'Développement C#'=>3,
                    )))
            ->add('statut', ChoiceType::class, array(
                'choices'=>array(
                    'M\'intéresse plus'=>-1,
                    'Candidater'=>0,
                    'Candidature envoyée'=>10,
                    'Premier contact tél/mail'=>20,
                    'Premier RdV convenu'=>30,
                    'Deuxième RdV convenu'=>33,
                    'Troisième RdV convenu'=>36,
                    'RdV test technique convenu'=>40,
                    'RdV après test technique convenu'=>45,
                    'Candidature réfusée'=>99,
                    'Période d\'essai'=>999,
                    'En poste'=>1000,
                    )))
            ->add('save', SubmitType::class);

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        // Si la méthode de la requête est POST et que la saisie du formulaire est valide, ...
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                // On récupère l'EntityManager
                $em = $this->getDoctrine()->getManager();

                // Étape 1 : On « persiste » l'entité
                $em->persist($offre);

                // Étape 2 : On « flush » tout ce qui a été persisté avant
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Offre bien enregistrée.');

                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('tools_looking_for_job_ficheoffre', array('id'=>$offre->getId()));                
            }
        }

        // Si on est ici, c'est ...
            // soit parce que la méthode de la requête est GET, ce qui 
            //veut dire que l'utilisateur n'a pas encore vu le formulaire

            // soit la méthode est bien POST mais la saisie est invalide,
            // donc, on réaffiche le formulaire.

        return $this->render('ToolsLookingForJobBundle::formoffre.html.twig', array('form' => $form->createView(),));
    }


    public function editoffreAction(Request $request, $id)
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('ToolsLookingForJobBundle:Offre');
        $offre=$repository->find($id);

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $offre);
        $formBuilder
            ->add('titre', TextType::class)
            ->add('url', TextType::class, array('required'=>false))
            ->add('contact', TextareaType::class, array('required'=>false))
            ->add('texte', TextareaType::class)
            ->add('date_publication', DateType::class)
            ->add('date_dernier_contact', DateType::class)
            ->add('metier', ChoiceType::class, array(
                'choices'=>array(
                    'N\'importe quoi'=>0,
                    'Numérisation 3D'=>1,
                    'Développement web'=>2,
                    'Développement C#'=>3,
                    )))
            ->add('statut', ChoiceType::class, array(
                'choices'=>array(
                    'M\'intéresse plus'=>-1,
                    'Candidater'=>0,
                    'Candidature envoyée'=>10,
                    'Premier contact tél/mail'=>20,
                    'Premier RdV convenu'=>30,
                    'Deuxième RdV convenu'=>33,
                    'Troisième RdV convenu'=>36,
                    'RdV test technique convenu'=>40,
                    'RdV après test technique convenu'=>45,
                    'Candidature réfusée'=>99,
                    'Période d\'essai'=>999,
                    'En poste'=>1000,
                    )))
            ->add('commentaires', TextareaType::class, array('required' => false))
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($offre);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Offre bien enregistrée.');
                return $this->redirectToRoute('tools_looking_for_job_ficheoffre', array('id'=>$offre->getId()));                
            }
        }
        return $this->render('ToolsLookingForJobBundle::formoffre.html.twig', array('form' => $form->createView(),));
    }

    public function deloffreAction(Offre $offre)
    {
        $em = $this
          ->getDoctrine()
          ->getManager();
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('tools_looking_for_job_listeoffres');                
    }

    private function getStatus($key){
        $statut = array(
            -1=>'M\intéresse plus',
            0=>'Candidater',
            10=>'Candidature envoyée',
            20=>'Premier contact tél/mail',
            30=>'Premier RdV convenu',
            33=>'Deuxième RdV convenu',
            36=>'Troisième RdV convenu',
            40=>'RdV test technique convenu',
            45=>'RdV après test technique convenu',
            99=>'Candidature réfusée',
            999=>'Période d\'essai',
            1000=>'En poste');
        if($key==self::ALLARRAY){
            return $statut ;
        }else{
            return $statut[$key] ;
        }
    }

    private function getMetier($key){
        $metier=array(
            0 => 'N\'importe quoi',
            1 => 'Numérisation 3D',
            2 => 'Développement web',
            3 => 'Développement C#'
            );
        if($key==self::ALLARRAY){
            return $metier ;
        }else{
            return $metier[$key] ;
        }
    }    
}
