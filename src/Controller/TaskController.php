<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/new-task', name: 'app_new_task')]
    #[Route('/edit-task/{id}', name: 'app_edit_task', methods: 'POST')]
    public function newTask(
        TaskRepository $taskRepository,
        Request $request
    ): Response
    {
        $task = $taskRepository->findOneBy(["id" => $request->get('id')]);

        return $this->render('task/form_task.html.twig', [
            "task" => $task
        ]);
    }

    #[Route('/save-task/{id}', name: 'app_save_task', methods: 'POST')]
    public function saveTask(
        EntityManagerInterface $em,
        TaskRepository $taskRepository,
        Request $request
    ): Response
    {
        try {
            $task = $request->headers->get('referer') === 'new-task' ? new Task() : $taskRepository->findOneBy(["id" => $request->get('id')]);
            $task->setName($request->get('name'));
            $task->setDescription($request->get('description'));

            if ($request->get('priority') !== '') {
                $task->setPriority($request->get('priority'));
            }

            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('app_home');
        } catch (\Exception $e) {
        }
    }

    #[Route('/delete-task/{id}', name: 'app_delete_task', methods: 'POST')]
    public function deleteTask(
        TaskRepository $taskRepository,
        Request $request
    ): Response
    {
        try {
            $taskRepository->deleteOneBy(["id" => $request->get('id')]);

            return $this->redirectToRoute('app_home');
        } catch (\Exception $e) {
        }
    }
}
