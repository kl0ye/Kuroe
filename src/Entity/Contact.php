<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact {

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50)
     */
    private $nom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50)
     */
    private $prenom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *  pattern"/[0-9]{10}/"
     * )
     */
    private $phone;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50)
     */
    private $adresse;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50)
     */
    private $adresse2;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *  pattern"/[0-9]{50}/"
     * )
     */
    private $etage;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *  pattern"/[0-9]{100}/"
     * )
     */
    private $batiment;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=50)
     */
    private $ville;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *  pattern"/[0-9]{5}/"
     * )
     */
    private $postal;

    /**
     * @var string|null
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): Contact
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(string $adresse2): Contact
    {
        $this->adresse2 = $adresse2;
        return $this;
    }

    public function getBatiment(): ?string
    {
        return $this->batiment;
    }

    public function setBatiment(string $batiment): Contact
    {
        $this->batiment = $batiment;
        return $this;
    }

    public function getEtage(): ?string
    {
        return $this->etage;
    }

    public function setEtage(string $etage): Contact
    {
        $this->etage = $etage;
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): Contact
    {
        $this->ville = $ville;
        return $this;
    }

    public function getPostal(): ?string
    {
        return $this->postal;
    }

    public function setPostal(string $postal): Contact
    {
        $this->postal = $postal;
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