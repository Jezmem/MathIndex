<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Classroom;

class ClassroomFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $classroom1 = new Classroom();
        $classroom1->setName('Seconde');
        $manager->persist($classroom1);

        $classroom2 = new Classroom();
        $classroom2->setName('Première');
        $manager->persist($classroom2);

        $classroom3 = new Classroom();
        $classroom3->setName('Terminale');
        $manager->persist($classroom3);

        $classroom4 = new Classroom();
        $classroom4->setName('BTS1');
        $manager->persist($classroom4);

        $classroom5 = new Classroom();
        $classroom5->setName('BTS2');
        $manager->persist($classroom5);

        $classroom6 = new Classroom();
        $classroom6->setName('Licence');
        $manager->persist($classroom6);

        $manager->flush();
    }
}
