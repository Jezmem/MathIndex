<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Course;

class CourseFixtures extends Fixture
{
    public const COURSE_REFERENCE = 'course_reference';

    public function load(ObjectManager $manager)
    {
        $courseNames = [
            'Mathématiques',
            'Physique',
            'Informatique',
            'Biologie',
            'Chimie',
            'Langues étrangères',
            'Français'
        ];

        foreach ($courseNames as $i => $name) {
            $course = new Course();
            $course->setName($name);
            $this->addReference(self::COURSE_REFERENCE.$i, $course);
            $manager->persist($course);
        }

        $manager->flush();
    }
}
