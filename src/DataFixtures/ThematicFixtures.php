<?php

namespace App\DataFixtures;

use App\Entity\Thematic;
use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ThematicFixtures extends Fixture
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

        // Création des thèmes pour le cours de mathématiques
        $thematicNames = ['Algèbre', 'Géométrie', 'Calcul différentiel', 'Statistiques'];
        foreach ($thematicNames as $thematicName) {
            $thematic = new Thematic();
            $thematic->setName($thematicName);
            $thematic->setCourseId($course);

            $manager->persist($thematic);
        }

        $manager->flush();
    }
}
