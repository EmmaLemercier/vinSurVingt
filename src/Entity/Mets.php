<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MetsRepository")
 */
class Mets
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
    private $libelleMets;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BouteilleMets", mappedBy="mets", orphanRemoval=true)
     */
    private $bouteillesMets;

    public function __construct()
    {
        $this->bouteillesMets = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleMets(): string
    {
        return $this->libelleMets;
    }

    public function setLibelleMets(string $libelleMets): self
    {
        $this->libelleMets = $libelleMets;

        return $this;
    }

    /**
     * @return Collection|BouteilleMets[]
     */
    public function getBouteillesMets(): Collection
    {
        return $this->bouteillesMets;
    }

    public function addBouteillesMet(BouteilleMets $bouteillesMet): self
    {
        if (!$this->bouteillesMets->contains($bouteillesMet)) {
            $this->bouteillesMets[] = $bouteillesMet;
            $bouteillesMet->setMets($this);
        }

        return $this;
    }

    public function removeBouteillesMet(BouteilleMets $bouteillesMet): self
    {
        if ($this->bouteillesMets->contains($bouteillesMet)) {
            $this->bouteillesMets->removeElement($bouteillesMet);
            // set the owning side to null (unless already changed)
            if ($bouteillesMet->getMets() === $this) {
                $bouteillesMet->setMets(null);
            }
        }

        return $this;
    }
}
