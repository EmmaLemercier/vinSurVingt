<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CepageRepository")
 */
class Cepage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelleCepage;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BouteilleCepage", mappedBy="cepage", orphanRemoval=true)
     */
    private $bouteillesCepage;

    public function __construct()
    {
        $this->bouteillesCepage = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLibelleCepage(): string
    {
        return $this->libelleCepage;
    }

    public function setLibelleCepage(string $libelleCepage): self
    {
        $this->libelleCepage = $libelleCepage;

        return $this;
    }

    /**
     * @return Collection|BouteilleCepage[]
     */
    public function getBouteillesCepage(): Collection
    {
        return $this->bouteillesCepage;
    }

    public function addBouteillesCepage(BouteilleCepage $bouteillesCepage): self
    {
        if (!$this->bouteillesCepage->contains($bouteillesCepage)) {
            $this->bouteillesCepage[] = $bouteillesCepage;
            $bouteillesCepage->setCepage($this);
        }

        return $this;
    }

    public function removeBouteillesCepage(BouteilleCepage $bouteillesCepage): self
    {
        if ($this->bouteillesCepage->contains($bouteillesCepage)) {
            $this->bouteillesCepage->removeElement($bouteillesCepage);
            // set the owning side to null (unless already changed)
            if ($bouteillesCepage->getCepage() === $this) {
                $bouteillesCepage->setCepage(null);
            }
        }

        return $this;
    }
}
