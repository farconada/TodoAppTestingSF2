<?php

namespace Fer\TodoBundle\Controller;

use Fer\TodoBundle\Entity\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Templating\EngineInterface;

class TaskController extends Controller
{

    private $repository;

    private $templating;

    public function __construct(TaskRepository $repository, EngineInterface $templating) {
        $this->repository = $repository;
        $this->templating = $templating;
    }

    public function indexAction()
    {
        return $this->templating->render('FerTodoBundle:Task:index');
    }

    public function saveAction($argument1)
    {
        // TODO: write logic here
        return $this->templating->render('FerTodoBundle:Task:save');
    }

    public function deleteAction($argument1)
    {
        // TODO: write logic here
        return $this->templating->render('FerTodoBundle:Task:edit');
    }
}
