<?php
namespace App\Controller;

use App\Repository\StudentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class StudentsController extends AbstractController
{
    public function getVoen(StudentsRepository $repo): Response
    {
        $students = $repo->findByForVoen();
        return new Response(json_encode($students));
    }
}
