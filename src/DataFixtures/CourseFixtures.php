<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Course;

class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $course1 = new Course();
        $course1->setName('Mathématiques');
        $manager->persist($course1);

        $course2 = new Course();
        $course2->setName('Physique');
        $manager->persist($course2);

        $course3 = new Course();
        $course3->setName('Informatique');
        $manager->persist($course3);

        $course4 = new Course();
        $course4->setName('Biologie');
        $manager->persist($course4);

        $course5 = new Course();
        $course5->setName('Chimie');
        $manager->persist($course5);

        $course6 = new Course();
        $course6->setName('Langues étrangères');
        $manager->persist($course6);

        $course7 = new Course();
        $course7->setName('Français');
        $manager->persist($course7);

        $manager->flush();
    }
}
