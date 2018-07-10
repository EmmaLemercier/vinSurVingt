<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommuneRepository")
 */
class Commune
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostalCommune;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleCommune;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Membre", mappedBy="commune")
     */
    private $membres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PointDeVente", mappedBy="commune")
     */
    private $pointDeVentes;

    public function __construct()
    {
        $this->membres = new ArrayCollection();
        $this->pointDeVentes = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCodePostalCommune(): int
    {
        return $this->codePostalCommune;
    }

    public function setCodePostalCommune(int $codePostalCommune): self
    {
        $this->codePostalCommune = $codePostalCommune;

        return $this;
    }

    public function getLibelleCommune(): string
    {
        return $this->libelleCommune;
    }

    public function setLibelleCommune(string $libelleCommune): self
    {
        $this->libelleCommune = $libelleCommune;

        return $this;
    }

    /**
     * @return Collection|Membre[]
     */
    public function getMembres(): Collection
    {
        return $this->membres;
    }

    public function addMembre(Membre $membre): self
    {
        if (!$this->membres->contains($membre)) {
            $this->membres[] = $membre;
            $membre->setCommune($this);
        }

        return $this;
    }

    public function removeMembre(Membre $membre): self
    {
        if ($this->membres->contains($membre)) {
            $this->membres->removeElement($membre);
            // set the owning side to null (unless already changed)
            if ($membre->getCommune() === $this) {
                $membre->setCommune(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PointDeVente[]
     */
    public function getPointDeVentes(): Collection
    {
        return $this->pointDeVentes;
    }

    public function addPointDeVente(PointDeVente $pointDeVente): self
    {
        if (!$this->pointDeVentes->contains($pointDeVente)) {
            $this->pointDeVentes[] = $pointDeVente;
            $pointDeVente->setCommune($this);
        }

        return $this;
    }

    public function removePointDeVente(PointDeVente $pointDeVente): self
    {
        if ($this->pointDeVentes->contains($pointDeVente)) {
            $this->pointDeVentes->removeElement($pointDeVente);
            // set the owning side to null (unless already changed)
            if ($pointDeVente->getCommune() === $this) {
                $pointDeVente->setCommune(null);
            }
        }

        return $this;
    }
}
