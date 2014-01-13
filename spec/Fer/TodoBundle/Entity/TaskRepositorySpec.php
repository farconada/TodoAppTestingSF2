<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 03/01/14
 * Time: 12:28
 */

namespace spec\Fer\TodoBundle\Entity;

use PhpSpec\ObjectBehavior;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Prophecy\Argument;
use Fer\TodoBundle\Entity\Task;

class TaskRepositorySpec extends ObjectBehavior {
    public function let(EntityManager $em, ClassMetadata $metadata) {
        $em->flush()->shouldBeCalled();
        $this->beConstructedWith($em, $metadata);
    }

    public function it_has_a_save_function_for_new_tasks(EntityManager $em, Task $task) {
        $task->getId()->willReturn(FALSE);
        $em->persist($task)->shouldBeCalled();
        $this->save($task);
    }

    public function it_has_a_save_function_to_update_tasks(EntityManager $em, Task $task) {
        $task->getId()->willReturn(1);
        $em->persist($task)->shouldNotBeCalled();
        $em->merge($task)->shouldBeCalled();
        $this->save($task);
    }

    public function it_should_have_remove_function(EntityManager $em, Task $task) {
        $em->remove($task)->shouldBeCalled();
        $this->remove($task);
    }
} 