<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;

class CommunicationsController extends Controller
{
    /**
     * @Route("/message/new", name="new_message")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newMessageAction(Request $request)
    {
        if ($request->isMethod('POST')) {
           $this->queueMessage($request);
            return $this->render('default/new_message.html.twig', ['loggedIn' => true, 'messageQueued' => true]);
        } else {
            return $this->render('default/new_message.html.twig', ['loggedIn' => true, 'messageQueued' => false]);
        }
    }

    /**
     * Queue a message.
     *
     * @param Request $request
     */
    private function queueMessage(Request $request)
    {

        $msg = array('userid' => 123456);
        $this->get('old_sound_rabbit_mq.send_message_producer')->publish(serialize($msg));
    }

    /**
     * @Route("/message/log", name="message_history")
     */
    public function messageHistoryAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/log.html.twig', ['loggedIn' => true]);
    }
}
