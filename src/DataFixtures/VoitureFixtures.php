<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Car;


class VoitureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $modele= array("clio", "twingo", "golf", "ibiza", "106");
             
        for ($i=0; $i < 5; $i++) { 
            # code...
            
            $value = new Car();
            $value->setname($modele[$i]);
            $manager->persist($value);     
        }

        $manager->flush();
    }
}
