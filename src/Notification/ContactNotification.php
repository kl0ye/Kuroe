<?php

namespace App\Notification;

use Twig\Environment;
use App\Entity\Contact;

class ContactNotification {

    /**
    * @var \Swift_Mailer
    */
    private $mailer;
    /**
     * @var Environenment
     */

    private $renderer;

    public function _construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify(Contact $contact) {
        $message = (new \Swift_Message('Demande de contact'))
            ->setFrom($contact->getEmail())
            ->setTo('kloye.box@gmail.com')
            ->setReplyTo($contact->getEmail())
            ->setBody($contact->getMessage() + ' de ' + $contact->getNom() + ' ' + $contact->getPrenom());
    }
}