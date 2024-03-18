<?php
// src/DataFixtures/ExerciseFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Exercise;


class ExerciseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {       
    $exercise1 = new Exercise();
    $exercise1->setName('Exercice Trigo n°1');
    $exercise1->setCourseId(1); // Mathématique
    $exercise1->setClassroomId(3); // Terminale
    $exercise1->setThematicId(1); //Trigonométrie
    $exercise1->setChapter('Chapitre 4');
    $exercise1->setKeyword('Trigo'); 
    $exercise1->setDifficulty(3); 
    $exercise1->setDuration(2); 
    $exercise1->setOriginId(2); // Manuel
    $exercise1->setOriginName('LesMathPourLesNuls');
    $exercise1->setOriginInformation('page 146'); 
    $exercise1->setProposedByType('Proffesseur'); 
    $exercise1->setProposedByFirstName('Laurent'); 
    $exercise1->setProposedByLastName('Guyart'); 
    $exercise1->setExerciseFileId(3); // example_image.png
    $exercise1->setCorrectionFileId(1);  // document1.docx
    $exercise1->setCreatedById(1); // Pierre Dupont

    $manager->persist($exercise1);

     
    $exercise2 = new Exercise();
    $exercise2->setName('écriture personnel sur Paris');
    $exercise2->setCourseId(7); // Mathématique
    $exercise2->setClassroomId(4); // BTS1
    $exercise2->setThematicId(10); //paris
    $exercise2->setChapter('Chapitre 2');
    $exercise2->setKeyword('Paris, corpus, écriture perso'); 
    $exercise2->setDifficulty(2); 
    $exercise2->setDuration(0.5); 
    $exercise2->setOriginId(2); // Manuel
    $exercise2->setOriginName('Paris ville capitale ?');
    $exercise2->setOriginInformation('page 46'); 
    $exercise2->setProposedByType('Proffesseur'); 
    $exercise2->setProposedByFirstName('Virginie'); 
    $exercise2->setProposedByLastName('Hougron'); 
    $exercise2->setExerciseFileId(3); // example_image.png
    $exercise2->setCorrectionFileId(1);  // document1.docx
    $exercise2->setCreatedById(4); // Lucie Lefevre

    $manager->persist($exercise2);

    $manager->flush();
    }
    
}
