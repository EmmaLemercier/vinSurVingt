<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BouteilleMetsRepository")
 */
class BouteilleMets
{

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Bouteille", inversedBy="metsBouteille")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bouteille;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Mets", inversedBy="bouteillesMets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mets;

    /**
     * @ORM\Column(type="integer")
     */
    private $noteBouteilleMets;

    public function getId()
    {
        return $this->id;
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

    public function getMets(): Mets
    {
        return $this->mets;
    }

    public function setMets(Mets $mets): self
    {
        $this->mets = $mets;

        return $this;
    }

    public function getNoteBouteilleMets(): int
    {
        return $this->noteBouteilleMets;
    }

    public function setNoteBouteilleMets(int $noteBouteilleMets): self
    {
        $this->noteBouteilleMets = $noteBouteilleMets;

        return $this;
    }
}
