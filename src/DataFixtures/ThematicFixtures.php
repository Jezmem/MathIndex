<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\Thematic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ThematicFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $thematic1 = new Thematic();
            $thematic1->setName('Thème 1');
            $thematic1->setCourseId(1);
            $manager->persist($thematic1);

            $thematic2 = new Thematic();
            $thematic2->setName('Thème 2');
            $thematic2->setCourseId(2);
            $manager->persist($thematic2);

            $thematic3 = new Thematic();
            $thematic3->setName('Thème 3');
            $thematic3->setCourseId(5);
            $manager->persist($thematic3);

            $thematic4 = new Thematic();
            $thematic4->setName('Thème 4');
            $thematic4->setCourseId(2);
            $manager->persist($thematic4);

        $manager->flush();
    }
}
