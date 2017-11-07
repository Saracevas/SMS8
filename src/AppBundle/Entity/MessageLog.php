<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageLog
 *
 * @ORM\Table(name="message_log")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageLogRepository")
 */
class MessageLog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="send_to", type="string", length=100)
     */
    private $sendTo;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="sent_by", type="string", length=255)
     */
    private $sentBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sent_at", type="datetime")
     */
    private $sentAt;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sendTo
     *
     * @param string $sendTo
     *
     * @return MessageLog
     */
    public function setSendTo($sendTo)
    {
        $this->sendTo = $sendTo;

        return $this;
    }

    /**
     * Get sendTo
     *
     * @return string
     */
    public function getSendTo()
    {
        return $this->sendTo;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return MessageLog
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set sentBy
     *
     * @param string $sentBy
     *
     * @return MessageLog
     */
    public function setSentBy($sentBy)
    {
        $this->sentBy = $sentBy;

        return $this;
    }

    /**
     * Get sentBy
     *
     * @return string
     */
    public function getSentBy()
    {
        return $this->sentBy;
    }

    /**
     * Set sentAt
     *
     * @param \DateTime $sentAt
     *
     * @return MessageLog
     */
    public function setSentAt($sentAt)
    {
        $this->sentAt = $sentAt;

        return $this;
    }

    /**
     * Get sentAt
     *
     * @return \DateTime
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return MessageLog
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}

