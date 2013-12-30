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

class TaskSpec extends ObjectBehavior{
    public function let() {
        $this->beConstructedWith('una cadena con el nombre');
    }

    public function it_should_be_initializable() {
        $this->shouldHaveType('Fer\TodoBundle\Entity\Task');
    }
    
} 