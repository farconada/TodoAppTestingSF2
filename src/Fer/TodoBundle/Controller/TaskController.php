<?php

namespace Fer\TodoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{
    public function indexAction()
    {
        return $this->render('FerTodoBundle:Default:index.html.twig');
    }
}
