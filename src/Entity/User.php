<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $fistname;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Car", mappedBy="user")
     */
    private $carId;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Color", mappedBy="user")
     */
    private $colorId;

    public function __construct()
    {
        $this->carId = new ArrayCollection();
        $this->colorId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFistname(): ?string
    {
        return $this->fistname;
    }

    public function setFistname(string $fistname): self
    {
        $this->fistname = $fistname;

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

    /**
     * @return Collection|car[]
     */
    public function getCarId(): Collection
    {
        return $this->carId;
    }

    public function addCarId(car $carId): self
    {
        if (!$this->carId->contains($carId)) {
            $this->carId[] = $carId;
            $carId->setUser($this);
        }

        return $this;
    }

    public function removeCarId(car $carId): self
    {
        if ($this->carId->contains($carId)) {
            $this->carId->removeElement($carId);
            // set the owning side to null (unless already changed)
            if ($carId->getUser() === $this) {
                $carId->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|color[]
     */
    public function getColorId(): Collection
    {
        return $this->colorId;
    }

    public function addColorId(color $colorId): self
    {
        if (!$this->colorId->contains($colorId)) {
            $this->colorId[] = $colorId;
            $colorId->setUser($this);
        }

        return $this;
    }

    public function removeColorId(color $colorId): self
    {
        if ($this->colorId->contains($colorId)) {
            $this->colorId->removeElement($colorId);
            // set the owning side to null (unless already changed)
            if ($colorId->getUser() === $this) {
                $colorId->setUser(null);
            }
        }

        return $this;
    }
}
