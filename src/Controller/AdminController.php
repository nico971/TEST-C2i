<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use \Symfony\Component\Validator\Constraints\Date;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {

        $repo = $this->getDoctrine()->getRepository(User::class);

        $fiches = $repo->findAll();
        
        //var_dump($fiches);
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'fiches' => $fiches
        ]);
        
    }
}
