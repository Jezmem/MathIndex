<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Récupération d'un cours
        $course = $manager->getRepository(Course::class)->findOneBy(['name' => 'Mathématiques']);
        if (!$course) {
            // Si le cours n'existe pas, vous devrez le créer ou utiliser un autre cours existant
            $course = new Course();
            $course->setName('Mathématiques');
            // Ajoutez d'autres propriétés et configurez-les selon vos besoins

            $manager->persist($course);
            $manager->flush();
        }

        // Création des compétences pour le cours de mathématiques
        $skillNames = ['Arithmétique', 'Algèbre linéaire', 'Géométrie euclidienne', 'Calcul différentiel'];
        foreach ($skillNames as $skillName) {
            $skill = new Skill();
            $skill->setName($skillName);
            $skill->setCourseId($course);

            $manager->persist($skill);
        }

        $manager->flush();
    }
}
