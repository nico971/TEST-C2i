<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date")
     */
    private $dateofbirth;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasdriverlicence;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\car", inversedBy="userid")
     */
    private $carid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\color", inversedBy="userid")
     */
    private $colorid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDateofbirth(): ?\DateTimeInterface
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(\DateTimeInterface $dateofbirth): self
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    public function getHasdriverlicence(): ?bool
    {
        return $this->hasdriverlicence;
    }

    public function setHasdriverlicence(bool $hasdriverlicence): self
    {
        $this->hasdriverlicence = $hasdriverlicence;

        return $this;
    }

    public function getCarid(): ?car
    {
        return $this->carid;
    }

    public function setCarid(?car $carid): self
    {
        $this->carid = $carid;

        return $this;
    }

    public function getColorid(): ?color
    {
        return $this->colorid;
    }

    public function setColorid(?color $colorid): self
    {
        $this->colorid = $colorid;

        return $this;
    }
}
