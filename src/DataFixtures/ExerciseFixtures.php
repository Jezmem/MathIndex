<?php 

namespace App\DataFixtures;

use App\Entity\Exercise;
use App\Entity\Thematic;
use App\Entity\Classroom;
use App\Entity\Course;
use App\Entity\Origin;
use App\Entity\User;
use App\Entity\File;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExerciseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création d'un exercice
        $exercise = new Exercise();
        $exercise->setName('Exercice de mathématiques');
        $exercise->setChapter('Algèbre linéaire');
        $exercise->setKeyword('Algèbre, Matrices, Opérations');
        $exercise->setDifficulty(3);
        $exercise->setDuration(60.0);
        $exercise->setOriginName('Livre de maths');
        $exercise->setOriginInformation('Exercice extrait du chapitre 4 du livre de maths');
        $exercise->setProposedByType('Professeur');
        $exercise->setProposedByFirstName('Jean');
        $exercise->setProposedByLastName('Dupont');

        // Récupération d'une thématique
        $thematic = $manager->getRepository(Thematic::class)->findOneBy(['name' => 'Algèbre linéaire']);
        if (!$thematic) {
            // Création de la thématique si elle n'existe pas
            $thematic = new Thematic();
            $thematic->setName('Algèbre linéaire');
            // Associer la thématique à l'exercice
            $exercise->setThematic($thematic);
        } else {
            $exercise->setThematic($thematic);
        }

        // Récupération d'une salle de classe
        $classroom = $manager->getRepository(Classroom::class)->findOneBy(['name' => 'Terminale']);
        if (!$classroom) {
            // Création de la salle de classe si elle n'existe pas
            $classroom = new Classroom();
            $classroom->setName('Terminale');
            // Associer la salle de classe à l'exercice
            $exercise->setClassroomId($classroom);
        } else {
            $exercise->setClassroomId($classroom);
        }

        // Récupération d'un cours
        $course = $manager->getRepository(Course::class)->findOneBy(['name' => 'Mathématiques']);
        if (!$course) {
            // Création du cours si il n'existe pas
            $course = new Course();
            $course->setName('Mathématiques');
            // Associer le cours à l'exercice
            $exercise->setCourse($course);
        } else {
            $exercise->setCourse($course);
        }

        // Récupération de l'origine
        $origin = $manager->getRepository(Origin::class)->findOneBy(['name' => 'Livre de maths']);
        if (!$origin) {
            // Création de l'origine si elle n'existe pas
            $origin = new Origin();
            $origin->setName('Livre de maths');
            // Associer l'origine à l'exercice
            $exercise->setOriginId($origin);
        } else {
            $exercise->setOriginId($origin);
        }

        // Récupération de l'utilisateur créateur de l'exercice
        $user = $manager->getRepository(User::class)->findOneBy(['email' => 'prof@example.com']);
        if (!$user) {
            // Création de l'utilisateur s'il n'existe pas
            $user = new User();
            $user->setEmail('prof@example.com');
            $user->setFirstName('Jean');
            $user->setLastName('Dupont');
            $user->setRoles(['ROLE_TEACHER']); // Rôle de professeur
            $user->setPassword('$argon2i$v=19$m=16,t=2,p=1$OGV5VmNnbm1kNTRzYlpWWQ$BjR4kkRl8t7d4I5/pqj+jg');
            // Associer l'utilisateur à l'exercice
            $exercise->setCreatedById($user);
        } else {
            $exercise->setCreatedById($user);
        }

        // Création d'un fichier pour l'exercice
        $exerciseFile = new File();
        $exerciseFile->setName('exercise.pdf');
        $exerciseFile->setOriginalName('exercise.pdf');
        $exerciseFile->setExtension('pdf');
        $exerciseFile->setSize(1024); // Taille en Ko
        // Associer le fichier à l'exercice
        $exercise->setExerciseFileId($exerciseFile);

        // Création d'un fichier de correction pour l'exercice
        $correctionFile = new File();
        $correctionFile->setName('correction.pdf');
        $correctionFile->setOriginalName('correction.pdf');
        $correctionFile->setExtension('pdf');
        $correctionFile->setSize(2048); // Taille en Ko
        // Associer le fichier de correction à l'exercice
        $exercise->setCorrectionFile($correctionFile);

        // Enregistrer l'exercice en base de données
        $manager->persist($exercise);
        $manager->persist($exerciseFile);
        $manager->persist($correctionFile);
        $manager->persist($thematic);
        $manager->persist($classroom);
        $manager->persist($course);
        $manager->persist($origin);
        $manager->persist($user);

        $manager->flush();
    }
}
