<?php
namespace spec\Fer\TodoBundle\Controller;
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 30/12/13
 * Time: 10:02
 */
use PhpSpec\ObjectBehavior;
use Fer\TodoBundle\Entity\TaskRepository;
use Fer\TodoBundle\Entity\Task;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\Response;
use Prophecy\Argument;
use JMS\Serializer\SerializerInterface;

class TaskControllerSpec extends ObjectBehavior {
    public function let(
        TaskRepository $taskRepo,
        TwigEngine $templating,
        Response $response,
        SerializerInterface $serializer
    ) {
        $templating->renderResponse(Argument::any())->willReturn($response);
        $this->beConstructedWith($taskRepo, $templating, $response, $serializer);
    }

    public function it_is_a_symfony_controller() {
        $this->shouldHaveType('Symfony\Bundle\FrameworkBundle\Controller\Controller');
    }

    public function it_should_have_index_action(TaskRepository $taskRepo) {
        $response = $this->indexAction();
        $response->shouldHaveType('Symfony\Component\HttpFoundation\Response');
    }

    public function it_should_have_save_action( TaskRepository $taskRepo) {
        $taskRepo->save(Argument::any())->shouldBeCalled();
        $taskData = json_encode(array('name' => 'mi tarea'));
        $response = $this->saveAction($taskData);
        $response->shouldHaveType('Symfony\Component\HttpFoundation\Response');
    }

    public function it_should_have_delete_action(Task $task, TaskRepository $taskRepo) {
        $taskRepo->remove($task)->shouldBeCalled();
        $response = $this->deleteAction($task);
        $response->shouldHaveType('Symfony\Component\HttpFoundation\Response');
    }

    public function it_should_have_a_list_action(TaskRepository $taskRepo) {
        $taskRepo->findAll()->shouldBeCalled();
        $response = $this->listAction();
        $response->shouldHaveType('Symfony\Component\HttpFoundation\Response');
    }

    public function it_should_have_a_archiva_action(Task $task, TaskRepository $taskRepo) {
        $taskRepo->save($task)->shouldBeCalled();
        $taskRepo->find(Argument::type('integer'))->shouldBeCalled();
        $taskRepo->find(Argument::type('integer'))->willReturn($task);
        $task->setArchived(TRUE)->shouldBeCalled();
        $response = $this->archivaAction(1);
        $response->shouldHaveType('Symfony\Component\HttpFoundation\Response');
    }


} 