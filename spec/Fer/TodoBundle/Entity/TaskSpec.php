<?php
namespace spec\Fer\TodoBundle\Entity;
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 30/12/13
 * Time: 16:42
 */

use PhpSpec\ObjectBehavior;
use Fer\TodoBundle\Entity\Task;
use Symfony\Component\Validator\Constraints\False;

class TaskSpec extends ObjectBehavior{
    public function let() {
        $this->beConstructedWith('una cadena con el nombre');
    }

    public function it_should_be_initializable() {
        $this->shouldHaveType('Fer\TodoBundle\Entity\Task');
    }

    /**
     * justo despues de crear el objeto
     */
    public function it_should_be_initialized_right() {
        $this->isDone()->shouldReturn(FALSE);
        $this->isArchived()->shouldReturn(FALSE);
    }
} 