<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Course;

class CourseFixtures extends Fixture
{
    public const COURSE_1 = 'course-1';
    public const COURSE_2 = 'course-2';
    public const COURSE_3 = 'course-3';

    public function load(ObjectManager $manager)
    {
        $course1 = new Course();
        $course1->setName('course-1');

        $course2 = new Course();
        $course2->setName('course-2');

        $course3 = new Course();
        $course3->setName('course-3');

        $manager->persist($course1);
        $manager->persist($course2);
        $manager->persist($course3);

        $this->addReference(self::COURSE_1, $course1);
        $this->addReference(self::COURSE_2, $course2);
        $this->addReference(self::COURSE_3, $course3);
        $manager->flush();
    }
}
