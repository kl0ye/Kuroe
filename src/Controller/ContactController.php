<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Manager\ContactManager;
use App\Notification\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{

    /**
     * @Route("/api/contact", name="api_contact_post", methods={"POST"})
     */
    public function formulaireContact(Request $request, ContactManager $contactManager, ContactNotification $notification)
    {
        $contactManager->mapper($request->getContent());
        // $notification->notify($contact);
        dump($request->getContent());
        die();
        return $this->json('Demande de contact envoyé', 201, []);
    }
}
