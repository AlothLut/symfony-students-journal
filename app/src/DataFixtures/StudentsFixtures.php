<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Students;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StudentsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $gender = ["Male", "Female"];
        for ($i = 0; $i < 30; $i++) {
            $student = new Students();
            $student->setName('student-' . $i);
            if ($i <= 10) {
                $student->addCourse($this->getReference(CourseFixtures::COURSE_1));
                $student->addCourse($this->getReference(CourseFixtures::COURSE_3));
            } else if ($i <= 20 && $i > 10) {
                $student->addCourse($this->getReference(CourseFixtures::COURSE_2));
            } else {
                $student->addCourse($this->getReference(CourseFixtures::COURSE_3));
                $student->addCourse($this->getReference(CourseFixtures::COURSE_2));
            }
            $student->setGender($gender[array_rand($gender, 1)]);
            $student->setAge(random_int(17, 23));
            $manager->persist($student);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CourseFixtures::class,
        ];
    }
}
