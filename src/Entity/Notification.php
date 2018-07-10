<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 */
class Notification
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
    private $contenuNotification;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureNotification;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Membre", inversedBy="notifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $membre;

    public function getId()
    {
        return $this->id;
    }

    public function getContenuNotification(): string
    {
        return $this->contenuNotification;
    }

    public function setContenuNotification(string $contenuNotification): self
    {
        $this->contenuNotification = $contenuNotification;

        return $this;
    }

    public function getDateHeureNotification(): \DateTimeInterface
    {
        return $this->dateHeureNotification;
    }

    public function setDateHeureNotification(\DateTimeInterface $dateHeureNotification): self
    {
        $this->dateHeureNotification = $dateHeureNotification;

        return $this;
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
}
