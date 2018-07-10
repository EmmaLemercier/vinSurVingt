<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BouteilleCepageRepository")
 */
class BouteilleCepage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bouteille", inversedBy="cepagesBouteille")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bouteille;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cepage", inversedBy="bouteillesCepage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cepage;

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

    public function getCepage(): Cepage
    {
        return $this->cepage;
    }

    public function setCepage(Cepage $cepage): self
    {
        $this->cepage = $cepage;

        return $this;
    }
}
