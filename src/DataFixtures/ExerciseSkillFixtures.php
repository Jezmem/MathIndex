<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ExerciseSkill;

class ExerciseSkillFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $exerciseSkill1 = new ExerciseSkill();
        $exerciseSkill1->setExerciseId(1);
        $exerciseSkill1->setSkillId(3);
        $manager->persist($exerciseSkill1);

        $exerciseSkill2 = new ExerciseSkill();
        $exerciseSkill2->setExerciseId(2);
        $exerciseSkill2->setSkillId(6);
        $manager->persist($exerciseSkill2);
      
        $manager->flush();
    }
}
