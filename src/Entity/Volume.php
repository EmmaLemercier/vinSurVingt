<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VolumeRepository")
 */
class Volume
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
    private $libelleVolume;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BouteilleVolume", mappedBy="volume", orphanRemoval=true)
     */
    private $bouteillesVolume;

    public function __construct()
    {
        $this->bouteillesVolume = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleVolume(): string
    {
        return $this->libelleVolume;
    }

    public function setLibelleVolume(string $libelleVolume): self
    {
        $this->libelleVolume = $libelleVolume;

        return $this;
    }

    /**
     * @return Collection|BouteilleVolume[]
     */
    public function getBouteillesVolume(): Collection
    {
        return $this->bouteillesVolume;
    }

    public function addBouteillesVolume(BouteilleVolume $bouteillesVolume): self
    {
        if (!$this->bouteillesVolume->contains($bouteillesVolume)) {
            $this->bouteillesVolume[] = $bouteillesVolume;
            $bouteillesVolume->setVolume($this);
        }

        return $this;
    }

    public function removeBouteillesVolume(BouteilleVolume $bouteillesVolume): self
    {
        if ($this->bouteillesVolume->contains($bouteillesVolume)) {
            $this->bouteillesVolume->removeElement($bouteillesVolume);
            // set the owning side to null (unless already changed)
            if ($bouteillesVolume->getVolume() === $this) {
                $bouteillesVolume->setVolume(null);
            }
        }

        return $this;
    }
}
