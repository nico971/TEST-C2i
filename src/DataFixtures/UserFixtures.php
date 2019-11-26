<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
#use \Symfony\Component\Validator\Constraints\Date;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $firstname= array("julien", "Max", "Testulien", "Cypher", "Tank");
        $lastname= array("Bill", "Paul", "Regis", "Anne", "Felix");

        
        $start = strtotime("10 September 2000");
    
        $end = strtotime("22 July 2010");
        

        for ($i=0; $i < 5; $i++) { 
            # code...
            
            $timestamp = mt_rand($start, $end); //Date de naissance differentes
            $user = new User();
            $user->setFistname($firstname[$i] )
                 ->setLastname($lastname[$i] )
                 ->setDateOfBirth(new \DateTime(date("Y-m-d", $timestamp)))
                 ->setHasDriverLicence(1);

            $manager->persist($user);     
        }

        $manager->flush();
    }
}
