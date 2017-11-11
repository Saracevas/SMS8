<?php
/**
 * Created by PhpStorm.
 * User: sylvestersaracevas
 * Date: 07/11/2017
 * Time: 19:53
 */
namespace AppBundle\Consumers;

use AppBundle\Entity\MessageLog;
use Doctrine\ORM\EntityManager;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Vresh\TwilioBundle\Service\TwilioWrapper;

class SendMessageConsumer implements ConsumerInterface
{
    /**
     * @var EntityManager $em
     */
    private $em;

    /**
     * SendMessageConsumer constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
        echo "Consumer is listening...\n";
    }

    public function execute(AMQPMessage $msg)
    {
        $body = unserialize($msg->body);

        /** @var MessageLog $messageLog */
        $messageLog = $this->em->find(MessageLog::class, $body['message_id']);

        $twilio = new TwilioWrapper(
            'AC845f74460a0721f96578d18bab1b4783',
            '86a02c677c1cf4499f6b9111c686a064'
        );

        // Send the message.
        try {
            $twilio->account->messages->sendMessage(
                '+441422400843',
                $messageLog->getSendTo(),
                $messageLog->getMessage()
            );

            $messageLog->setStatus('SENT');
            echo "Message sent successfully.";
        } catch (\Exception $e) {
            $messageLog->setStatus('FAILED');
            echo "Message sending failed.";
        }

        $this->em->persist($messageLog);
        $this->em->flush();
    }
}