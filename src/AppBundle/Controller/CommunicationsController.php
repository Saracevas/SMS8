<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;

class CommunicationsController extends Controller
{
    /**
     * @Route("/new", name="new_message")
     */
    public function newMessageAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/new_message.html.twig', ['loggedIn' => true]);
    }

    /**
     * @Route("/history", name="message_history")
     */
    public function messageHistoryAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/new_message.html.twig', ['loggedIn' => true]);
    }
}
