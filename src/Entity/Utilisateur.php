<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
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
    private $pseudoMembre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motDePasseMembre;

    public function getId()
    {
        return $this->id;
    }

    public function getPseudoMembre()
    {
        return $this->pseudoMembre;
    }

    public function setPseudoMembre(string $pseudoMembre): self
    {
        $this->pseudoMembre = $pseudoMembre;

        return $this;
    }

    public function getMotDePasseMembre(): string
    {
        return $this->motDePasseMembre;
    }

    public function setMotDePasseMembre(string $motDePasseMembre): self
    {
        $this->motDePasseMembre = $motDePasseMembre;

        return $this;
    }
}
