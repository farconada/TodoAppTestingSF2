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
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Prophecy\Argument;

class TaskControllerSpec extends ObjectBehavior {
    public function let(
        TaskRepository $taskRepo,
        EngineInterface $templating,
        Response $response
    ) {
        $templating->render(Argument::any())->willReturn($response);
        $this->beConstructedWith($taskRepo, $templating);
    }

    public function it_is_a_symfony_controller() {
        $this->shouldHaveType('Symfony\Bundle\FrameworkBundle\Controller\Controller');
    }

    public function it_should_be_a_symfony_controller() {
        $this->shouldHaveType('Symfony\Bundle\FrameworkBundle\Controller\Controller');
    }

    public function it_should_have_index_action() {
        $response = $this->indexAction();
        $response->shouldHaveType('Symfony\Component\HttpFoundation\Response');
    }

    public function it_should_have_save_action(Task $task) {
        $response = $this->saveAction($task);
        $response->shouldHaveType('Symfony\Component\HttpFoundation\Response');
    }

    public function it_should_have_delete_action(Task $task) {
        $response = $this->deleteAction($task);
        $response->shouldHaveType('Symfony\Component\HttpFoundation\Response');
    }


} 