<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/new-task', name: 'app_new_task')]
    #[Route('/edit-task/{id}', name: 'app_edit_task', methods: 'GET')]
    public function newTask(
        TaskRepository $taskRepository,
        Request $request
    ): Response
    {
        try {
            $task = $taskRepository->findOneBy(["id" => $request->get('id')]);
            
            if ($request->attributes->get('_route') === 'app_edit_task' && ($task === '' || $task === null)) {
                throw new NotFoundHttpException("Task not found");
            }

            return $this->render('task/form_task.html.twig', [
                "task" => $task
            ]);
        } catch (NotFoundHttpException $e) {
            return $this->redirectToRoute('app_error_404');
        }
    }

    #[Route('/save-new-task', name: 'app_save_new_task')]
    #[Route('/save-task/{id}', name: 'app_save_task', methods: 'POST')]
    public function saveTask(
        EntityManagerInterface $em,
        TaskRepository $taskRepository,
        Request $request
    ): Response
    {
        try {
            $task = $request->attributes->get('_route') === 'app_save_new_task' ? new Task() : $taskRepository->findOneBy(["id" => $request->get('id')]);

            if ($task === '' || $task === null) {
                throw new NotFoundHttpException("Task not found");
            }
            
            $task->setName($request->get('name'));
            $task->setDescription($request->get('description'));

            if ($request->get('priority') !== '') {
                $task->setPriority($request->get('priority'));
            }

            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('app_home');
        } catch (NotFoundHttpException $e) {
            return $this->redirectToRoute('app_error_404');
        }
    }

    #[Route('/delete-task/{id}', name: 'app_delete_task', methods: 'GET')]
    public function deleteTask(
        TaskRepository $taskRepository,
        EntityManagerInterface $em,
        Request $request
    ): Response
    {
        try {
            $task = $taskRepository->findOneBy(["id" => $request->get('id')]);

            if ($task === '' || $task === null) {
                throw new NotFoundHttpException("Task not found");
            }
            $em->remove($task);
            $em->flush();

            return $this->redirectToRoute('app_home');
        } catch (NotFoundHttpException $e) {
            return $this->redirectToRoute('app_error_404');
        }
    }
}
