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

    public function _construct(Environment $renderer)
    {
        $this->renderer = $renderer;
    }

    public function notify(Contact $contact) {
        // $message = (new \Swift_Message('Demande de contct'))
        //     ->setFrom($contact->getEmail())
        //     ->setTo('kloye.box@gmail.com')
        //     ->setReplyTo($contact->getEmail())
        //     ->setBody(
        //         $this->renderView(
        //             'emails/contact.html.twig', [
        //             'contact' => $contact
        //         ]), 'text/html');
            
        //     $this->mailer->send($message);
        $to      = 'no-reply@kuroe.com';
        $subject = 'Demande de contact';
        $message = '
        <html>
         <body style="font-family: Verdana; text-align: center">
          <h1 style="background-color: #000; color: #fff; padding: 10px 0 15px">Vous avez reçu un message</h1>
          <div style="font-size: 15px; background-color: #fff; color: #000; margin: 15px 0">
           <p>Bonjour, '. $contact->getPrenom(). ' '. $contact->getNom() .' vous a envoyé le message suivant :</p>
           <p style="display: flex; justify-content: center; align-items: center; min-height: 100px; background-color: #f5f5f5; margin: 25px">'
            . $contact->getMessage() .'</p>
           <hr>
          </div>
          <p>Vous pouvez recontacter '. $contact->getPrenom(). ' au <strong>'. $contact->getPhone() .
          '</strong> ou par mail à l\'adresse <strong>'. $contact->getEmail() .'</strong></p>
         </body>
        </html>
        ';
   
        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'Content-type: text/html; charset=utf-8';
   
        // Envoi
        mail($to, $subject, $message, implode("\r\n", $headers));
    }
}