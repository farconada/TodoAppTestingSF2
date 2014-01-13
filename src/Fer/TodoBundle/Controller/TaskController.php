<?php

namespace Fer\TodoBundle\Controller;

use Fer\TodoBundle\Entity\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;
use JMS\DiExtraBundle\Annotation as DI;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class TaskController
{

    private $repository;

    private $templating;

    private $response;

    /**
     * @var
     */
    private $serializer;

    /**
     * @DI\InjectParams({
     *     "repository" = @DI\Inject("fer_todo.task_repository"),
     *     "templating" = @DI\Inject("templating"),
     *     "response"   = @DI\Inject("fer_todo.response"),
     *     "serializer" = @DI\Inject("jms_serializer")
     * })
     */
    public function __construct(TaskRepository $repository, EngineInterface $templating, Response $response, SerializerInterface $serializer) {
        $this->repository = $repository;
        $this->templating = $templating;
        $this->response   = $response;
        $this->serializer = $serializer;
    }

    public function indexAction()
    {
        return $this->templating->renderResponse('FerTodoBundle:Task:index.html.twig');
    }

    public function listAction()
    {
        $tasks = $this->repository->findAll();
        $this->response->setContent(json_encode($tasks));
        return $this->response;
    }

    public function saveAction(Request $request)
    {
        $task = $this->serializer->deserialize($request->getContent(),'Fer\TodoBundle\Entity\Task','json');
        $this->repository->save($task);
        $this->response->setContent($this->serializer->serialize(array('msg' => 'OK'), 'json'));
        return $this->response;
    }

    public function deleteAction($id)
    {
        $task = $this->repository->find($id);
        $this->repository->remove($task);
        $this->response->setContent($this->serializer->serialize(array('msg' => 'OK'), 'json'));
        return $this->response;
    }

    public function archivaAction($id)
    {
        $task = $this->repository->find($id);
        $task->setArchived(TRUE);
        $this->repository->save($task);
        $this->response->setContent($this->serializer->serialize(array('msg' => 'OK'), 'json'));
        return $this->response;
    }
}
