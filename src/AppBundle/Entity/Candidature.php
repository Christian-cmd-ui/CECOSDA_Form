<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Candidature
{
    // autres propriétés de candidature...

    /**
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    public $nom;
    /**
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    public $email;
    /**
     * @ORM\Column(name="telephone", type="string", length=255, nullable=false)
     */
    public $telephone;
    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $cv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png" })
     */
    private $photo;

    // Getters et setters pour les propriétés...

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
    public function getCv()
    {
        return $this->cv;
    }

    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }
}
?>