<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\color", inversedBy="carid")
     */
    private $carhascolor;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="carid")
     */
    private $userid;

    public function __construct()
    {
        $this->carhascolor = new ArrayCollection();
        $this->userid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|color[]
     */
    public function getCarhascolor(): Collection
    {
        return $this->carhascolor;
    }

    public function addCarhascolor(color $carhascolor): self
    {
        if (!$this->carhascolor->contains($carhascolor)) {
            $this->carhascolor[] = $carhascolor;
        }

        return $this;
    }

    public function removeCarhascolor(color $carhascolor): self
    {
        if ($this->carhascolor->contains($carhascolor)) {
            $this->carhascolor->removeElement($carhascolor);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserid(): Collection
    {
        return $this->userid;
    }

    public function addUserid(User $userid): self
    {
        if (!$this->userid->contains($userid)) {
            $this->userid[] = $userid;
            $userid->setCarid($this);
        }

        return $this;
    }

    public function removeUserid(User $userid): self
    {
        if ($this->userid->contains($userid)) {
            $this->userid->removeElement($userid);
            // set the owning side to null (unless already changed)
            if ($userid->getCarid() === $this) {
                $userid->setCarid(null);
            }
        }

        return $this;
    }
}
