<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
//use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
    

/**
     * @Route("/client/new", name="client_new")
     */
    
public function fomulaire(Request $request) {

    $user = new User();
    
    
   /* $user->setfirstname('John');
    $user->setlastname('Doe');
    $user->setdateofbirth(new \DateTime(date("Y-m-d")));
    $user->sethasdriverlicence(0);*/
    $form = $this->createFormBuilder($user)


        ->add('firstname', TextType::class, ['label' => 'Nom'], array(
            
            'empty_data' => 'NOM'
       ))
        ->add('lastname', TextType::class, ['label' => 'Prénom'])
        ->add('dateofbirth', DateType::class, [
            'label' => 'Date de naissance',
            'widget' => 'single_text',
            'html5' => false,
            'attr' => ['class' => 'js-datepicker'],
        ])
        ->add('hasdriverlicence', CheckboxType::class, array(
            'data' => true,
        ))
        ->add('carid', TextType::class)
        ->add('colorid', TextType::class)
        ->add('save', SubmitType::class, ['label' => 'Validation'])
      //->add('Valider', SubmitType::class, array('label' => 'New User'))
      ->getForm();
  

      $form->handleRequest($request);

  if ($form->isSubmitted()) {

    $user = $form->getData();

    $manager = $this->getDoctrine()->getManager();
                $manager->persist($user);
                $manager->flush();
  }

      
    
    return $this->render('client/formulaire.html.twig',[
    'formUser' => $form->createView()
    ]);
  
  }



}
