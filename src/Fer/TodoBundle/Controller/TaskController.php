<?php

namespace Fer\TodoBundle\Controller;

use Fer\TodoBundle\Entity\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Templating\EngineInterface;
use JMS\DiExtraBundle\Annotation as DI;

class TaskController extends Controller
{

    private $repository;

    private $templating;

    /**
     * @DI\InjectParams({
     *     "repository" = @DI\Inject("fer_todo.task_repository"),
     *     "templating" = @DI\Inject("templating")
     * })
     */
    public function __construct(TaskRepository $repository, EngineInterface $templating) {
        $this->repository = $repository;
        $this->templating = $templating;
    }

    public function indexAction()
    {
        $tasks = $this->repository->findAll();
        return $this->templating->renderResponse('FerTodoBundle:Task:index.html.twig');
    }

    public function saveAction($task)
    {
        $this->repository->save($task);
        return $this->templating->renderResponse('FerTodoBundle:Task:save.html.twig');
    }

    public function deleteAction($task)
    {
        $this->repository->remove($task);
        return $this->templating->renderResponse('FerTodoBundle:Task:edit.html.twig');
    }
}
