<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact {

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50)
     */
    private $nom;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50)
     */
    private $prenom;

    /**
     * @Assert\NotBlank()
     * Assert\Length(min=10, max=10)
     */
    private $phone;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): Contact
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): Contact
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): Contact
    {
        $this->message = $message;
        return $this;
    }

}