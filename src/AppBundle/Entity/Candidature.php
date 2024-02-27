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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;
    /**
<<<<<<< HEAD
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
=======
     * @ORM\Column(type="string", length=255, nullable=true)
>>>>>>> 945037cbdc8c646be1258abe043972486fd980a1
     */
    private $cv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png" })
     */
    private $photo;

    // Getters et setters pour les propriétés...

<<<<<<< HEAD
=======

>>>>>>> 945037cbdc8c646be1258abe043972486fd980a1
    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
<<<<<<< HEAD
=======

>>>>>>> 945037cbdc8c646be1258abe043972486fd980a1
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
<<<<<<< HEAD
=======

>>>>>>> 945037cbdc8c646be1258abe043972486fd980a1
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