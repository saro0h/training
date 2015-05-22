<?php

namespace BlogBundle\Service;

use BlogBundle\Entity\Article;

class ContactService
{
    private $recipient;

    private $mailer;

    /**
     * @param string $recipient
     * @param string $mailer
     */
    public function __construct($recipient, $mailer)
    {
        $this->recipient = $recipient;
        $this->mailer = $mailer;
    }

    public function sendMail(Article $article)
    {
        $message = \Swift_Message::newInstance()
            ->setTo($this->recipient)
            ->setFrom('moi@bar.com')
            ->setSubject('[My blog] A new article has been created.')
            ->setBody('Article created: '.$article->getContent())
        ;

        $this->mailer->send($message);
    }
}