<?php

namespace App\Manager;

use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;

class ContactManager {

    public function mapper($contact)
    {
        $contact = new Contact;
    }
}
