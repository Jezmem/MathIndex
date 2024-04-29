<?php

namespace App\DataFixtures;

use App\Entity\ExerciseSkill;
use App\Entity\Exercise;
use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExerciseSkillFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Récupération d'un exercice
        $exercise = $manager->getRepository(Exercise::class)->findOneBy(['name' => 'Exercice de mathématiques']);
        if (!$exercise) {
            // Si l'exercice n'existe pas, vous devrez le créer ou utiliser un autre exercice existant
            return;
        }

        // Récupération d'une compétence
        $skill = $manager->getRepository(Skill::class)->findOneBy(['name' => 'Algèbre']);
        if (!$skill) {
            // Si la compétence n'existe pas, vous devrez la créer ou utiliser une autre compétence existante
            return;
        }

        // Création d'une relation entre l'exercice et la compétence
        $exerciseSkill = new ExerciseSkill();
        $exerciseSkill->setExerciseId($exercise);
        $exerciseSkill->setSkillId($skill);

        // Enregistrement de la relation en base de données
        $manager->persist($exerciseSkill);
        $manager->flush();
    }
}
