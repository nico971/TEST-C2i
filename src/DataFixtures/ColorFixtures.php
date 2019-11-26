<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Color;


class ColorFixtures extends Fixture
    {
        public function load(ObjectManager $manager)
        {
            // $product = new Product();
            // $manager->persist($product);
            $color= array("rouge", "jaune", "vert", "gris", "rose");
                
            for ($i=0; $i < 5; $i++) { 
                # code...
                
                $value = new Color();
                $value->setname($color[$i]);
                $manager->persist($value);     
            }

            $manager->flush();
        }

    }
