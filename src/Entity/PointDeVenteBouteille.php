<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PointDeVenteBouteilleRepository")
 */
class PointDeVenteBouteille
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PointDeVente", inversedBy="bouteillesPointDeVente")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pointDeVente;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bouteille", inversedBy="pointsDeVenteBouteille")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bouteille;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $prix;

    public function getId()
    {
        return $this->id;
    }

    public function getPointDeVente(): PointDeVente
    {
        return $this->pointDeVente;
    }

    public function setPointDeVente(PointDeVente $pointDeVente): self
    {
        $this->pointDeVente = $pointDeVente;

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

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
