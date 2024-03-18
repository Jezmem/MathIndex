<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Origin;

class OriginFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $origin1 = new Origin();
        $origin1->setId(1);
        $origin1->setName('www.w3school.fr');
        $manager->persist($origin1);

        $origin2 = new Origin();
        $origin2->setId(2);
        $origin2->setName('Manuel de mathématiques - Terminale');
        $manager->persist($origin2);

        $origin3 = new Origin();
        $origin3->setId(3);
        $origin3->setName('Stack Overflow');
        $manager->persist($origin3);

        $origin4 = new Origin();
        $origin4->setId(4);
        $origin4->setName('Tutoriels Point');
        $manager->persist($origin4);

        $origin5 = new Origin();
        $origin5->setId(5);
        $origin5->setName('Khan Academy');
        $manager->persist($origin5);

        $manager->flush();
    }
}
