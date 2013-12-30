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

class TaskControllerSpec extends ObjectBehavior {

    public function it_should_be_a_symfony_controller() {
        $this->shouldHaveType('Symfony\Bundle\FrameworkBundle\Controller\Controller');
    }

    public function it_should_have_index_action() {
        $this->indexAction();
    }

    public function it_should_have_save_action(Task $task) {
        $this->saveAction($task);
    }

    public function it_should_have_delete_action(Task $task) {
        $this->deleteAction($task);
    }


} 