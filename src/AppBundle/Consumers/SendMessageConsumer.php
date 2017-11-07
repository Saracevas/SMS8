<?php
/**
 * Created by PhpStorm.
 * User: sylvestersaracevas
 * Date: 07/11/2017
 * Time: 19:53
 */
namespace AppBundle\Consumers;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class SendMessageConsumer implements ConsumerInterface
{
    private $logger; // Monolog-logger.

    // Init:
    public function __construct( )
    {
        echo "Consumer is listening...";
    }

    public function execute(AMQPMessage $msg)
    {
        echo "Consumer has completed the job.";
        // Do something with the data. Save to db, write a log, whatever.
    }
}