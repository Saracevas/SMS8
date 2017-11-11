<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MessageLog;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Asset\Package;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;

class MessageController extends Controller
{
    /**
     * @Route("/message/new", name="new_message")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newMessageAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $newMessage = new MessageLog();
        $newMessage->setSentBy($this->getUser()->getId());
        $newMessage->setStatus('PENDING');

        $form = $this->createFormBuilder($newMessage)
            ->add('sendTo')
            ->add('message', TextareaType::class)
            ->add('save', SubmitType::class, ['label' => 'Send Message'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newMessage = $form->getData();
            $newMessage->setSentAt(date_create(date("Y-m-d H:i:s")));

            $em = $this->getDoctrine()->getManager();
            $em->persist($newMessage);
            $em->flush();

            $this->get('old_sound_rabbit_mq.send_message_producer')->publish(serialize(['message_id' => $newMessage->getId()]));

            return $this->render('default/new_message.html.twig', [
                'messageQueued' => true
            ]);
        }

        return $this->render('default/new_message.html.twig', [
            'form' => $form->createView(),
            'messageQueued' => false
        ]);
    }

    /**
     * @Route("/message/log", name="message_history")
     */
    public function messageHistoryAction()
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $query = $qb->select('mg')
            ->from('AppBundle\Entity\MessageLog', 'mg')
            ->where('mg.sentBy = :sentBy')
            ->addOrderBy('mg.sentBy', 'DESC')
            ->setParameter('sentBy', $this->getUser()->getId())
            ->getQuery();

        return $this->render('default/log.html.twig', ['messages' => $query->execute()]);
    }
}
