<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembreBouteilleRepository")
 */
class MembreBouteille
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Membre", inversedBy="bouteillesMembre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $membre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bouteille", inversedBy="membresBouteille")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bouteille;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteVisuel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteOlfactif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteGustatif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantiteCave;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $wishlist;

    public function getId()
    {
        return $this->id;
    }

    public function getMembre(): Membre
    {
        return $this->membre;
    }

    public function setMembre(Membre $membre): self
    {
        $this->membre = $membre;

        return $this;
    }

    public function getBouteille(): Bouteille
    {
        return $this->bouteille;
    }

    public function setBouteille(Bouteille $bouteille): self
    {
        $this->bouteille = $bouteille;

        return $this;
    }

    public function getNoteVisuel(): int
    {
        return $this->noteVisuel;
    }

    public function setNoteVisuel(int $noteVisuel): self
    {
        $this->noteVisuel = $noteVisuel;

        return $this;
    }

    public function getNoteOlfactif(): int
    {
        return $this->noteOlfactif;
    }

    public function setNoteOlfactif(int $noteOlfactif): self
    {
        $this->noteOlfactif = $noteOlfactif;

        return $this;
    }

    public function getNoteGustatif(): int
    {
        return $this->noteGustatif;
    }

    public function setNoteGustatif(int $noteGustatif): self
    {
        $this->noteGustatif = $noteGustatif;

        return $this;
    }

    public function getQuantiteCave(): int
    {
        return $this->quantiteCave;
    }

    public function setQuantiteCave(int $quantiteCave): self
    {
        $this->quantiteCave = $quantiteCave;

        return $this;
    }

    public function getWishlist(): bool
    {
        return $this->wishlist;
    }

    public function setWishlist(bool $wishlist): self
    {
        $this->wishlist = $wishlist;

        return $this;
    }
}
