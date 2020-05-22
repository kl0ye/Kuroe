<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Notification\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactController extends AbstractController
{

    /**
     * @Route("/api/contact", name="api_contact_post", methods={"POST"})
     */
    public function formulaireContact(Request $request, SerializerInterface $serializer, ValidatorInterface $validator, MailerInterface $mailer)
    {
        $contact = $request->getContent();
        $newContact = $serializer->deserialize($contact, Contact::class, 'json');
        $errors = $validator->validate($newContact);
        if (count($errors) === 0) {
            $email = (new TemplatedEmail())
                        ->from('hello@example.com')
                        ->to('no-reply@kuroe.com')
                        ->htmlTemplate('emails/contact.html.twig')
                        ->context([
                            'contact' => $newContact
                        ]);

                    $mailer->send($email);
            return $this->json('envoie du mail', 201, []);
        }
        return $this->json($errors, 400, []);
    }
}
