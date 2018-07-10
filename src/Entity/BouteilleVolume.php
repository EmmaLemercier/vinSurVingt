<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BouteilleVolumeRepository")
 */
class BouteilleVolume
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bouteille", inversedBy="volumesBouteille")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bouteille;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Volume", inversedBy="bouteillesVolume")
     * @ORM\JoinColumn(nullable=false)
     */
    private $volume;

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

    public function getVolume(): Volume
    {
        return $this->volume;
    }

    public function setVolume(Volume $volume): self
    {
        $this->volume = $volume;

        return $this;
    }
}
