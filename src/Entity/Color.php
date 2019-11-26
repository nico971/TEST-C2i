<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ColorRepository")
 */
class Color
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Car", mappedBy="carhascolor")
     */
    private $carid;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="colorid")
     */
    private $userid;

    public function __construct()
    {
        $this->carid = new ArrayCollection();
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
     * @return Collection|Car[]
     */
    public function getCarid(): Collection
    {
        return $this->carid;
    }

    public function addCarid(Car $carid): self
    {
        if (!$this->carid->contains($carid)) {
            $this->carid[] = $carid;
            $carid->addCarhascolor($this);
        }

        return $this;
    }

    public function removeCarid(Car $carid): self
    {
        if ($this->carid->contains($carid)) {
            $this->carid->removeElement($carid);
            $carid->removeCarhascolor($this);
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
            $userid->setColorid($this);
        }

        return $this;
    }

    public function removeUserid(User $userid): self
    {
        if ($this->userid->contains($userid)) {
            $this->userid->removeElement($userid);
            // set the owning side to null (unless already changed)
            if ($userid->getColorid() === $this) {
                $userid->setColorid(null);
            }
        }

        return $this;
    }
}
