<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
            
            if ($tasks === '' || $tasks === null) {
                throw new NotFoundHttpException("Task not found");
            }

            
            return $this->render('main/index.html.twig', [
                "tasks" => $tasks,
            ]);
        } catch (NotFoundHttpException $e) {
            return $this->redirectToRoute('app_error_404');
        }
    }

    #[Route('/404', name: 'app_error_404')]
    public function error_404(
        TaskRepository $taskRepository
    ): Response
    {
        return $this->render('main/index.html.twig');
    }
}
