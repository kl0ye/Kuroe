<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Notification\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{

    /**
     * @Route("/api/contact", name="api_contact_post", methods={"POST"})
     */
    public function formulaireContact(Request $request, SerializerInterface $serializer, ContactNotification $notification)
    {
        $contact = $request->getContent();
        $newContact = $serializer->deserialize($contact, Contact::class, 'json');
        $notification->notify($newContact);
        // dump($request->getContent());
        // die();
        return $this->json($notification, 201, []);
    }
}
