<?php
// src/DataFixtures/SkillFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Skill;
use App\Entity\Course;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Récupération de quelques cours pour les lier aux compétences
        $courses = $manager->getRepository(Course::class)->findAll();


            $skill1 = new Skill();
            $skill1->setName('Chercher');
            $skill1->setCourseId(1);
            $manager->persist($skill1);

            $skill2 = new Skill();
            $skill2->setName('Représenter');
            $skill2->setCourseId(1);
            $manager->persist($skill2);

            $skill3 = new Skill();
            $skill3->setName('Calculer');
            $skill3->setCourseId(1);
            $manager->persist($skill3);

            $skill4 = new Skill();
            $skill4->setName('Modéliser');
            $skill4->setCourseId(1);
            $manager->persist($skill4);

            $skill5 = new Skill();
            $skill5->setName('Raisonner');
            $skill5->setCourseId(1);
            $manager->persist($skill5);

            $skill6 = new Skill();
            $skill6->setName('Communiquer');
            $skill6->setCourseId(1);
            $manager->persist($skill6);

        $manager->flush();
    }
}
