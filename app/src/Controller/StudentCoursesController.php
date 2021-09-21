<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Students;

class StudentCoursesController extends AbstractController
{
    public function getCourses(int $studentId): Response
    {

        $student = $this->getDoctrine()
            ->getRepository(Students::class)
            ->find($studentId);

        $res["courses"] = [];
        $courses = $student->getCourses()->toArray();
        foreach($courses as $k => $course) {
            $res["courses"][$k]['id'] = $course->getId();
            $res["courses"][$k]['name'] = $course->getName();
        }

        return new Response(json_encode($res));
    }
}