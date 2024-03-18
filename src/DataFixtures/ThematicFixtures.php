<?php
// src/DataFixtures/ThematicFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Thematic;

class ThematicFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $thematic1 = new Thematic();
            $thematic1->setName('Trigonométrie');
            $thematic1->setCourseId(1); 
            $manager->persist($thematic1);

            $thematic2 = new Thematic();
            $thematic2->setName('graphe');
            $thematic2->setCourseId(1); 
            $manager->persist($thematic2);

            $thematic3 = new Thematic();
            $thematic3->setName('Matrice');
            $thematic3->setCourseId(1); 
            $manager->persist($thematic3);

            $thematic4 = new Thematic();
            $thematic4->setName('Théorème de pythagore');
            $thematic4->setCourseId(1); 
            $manager->persist($thematic4);

            $thematic5 = new Thematic();
            $thematic5->setName('Thermodynamie');
            $thematic5->setCourseId(2); 
            $manager->persist($thematic5);

            $thematic6 = new Thematic();
            $thematic6->setName('Algorythmie');
            $thematic6->setCourseId(3); 
            $manager->persist($thematic6);

            $thematic7 = new Thematic();
            $thematic7->setName('Réflèxe musculaire');
            $thematic7->setCourseId(4); 
            $manager->persist($thematic7);

            $thematic8 = new Thematic();
            $thematic8->setName('Oxydoréduction');
            $thematic8->setCourseId(5); 
            $manager->persist($thematic8);

            $thematic9 = new Thematic();
            $thematic9->setName('The IA and the environment');
            $thematic9->setCourseId(6); 
            $manager->persist($thematic9);

            $thematic10 = new Thematic();
            $thematic10->setName('Paris');
            $thematic10->setCourseId(7); 
            $manager->persist($thematic10);
        $manager->flush();
    }
}