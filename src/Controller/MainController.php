<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function home(
        TaskRepository $taskRepository
    ): Response
    {
        try {
            $tasks = $taskRepository->findAllOrderedByPriority();

        return $this->render('main/index.html.twig', [
            "tasks" => $tasks,
        ]);
        } catch (\Exception $e) {
        }
    }
}
