<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembreRepository")
 */
class Membre
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
    private $emailMembre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="membre", orphanRemoval=true)
     */
    private $notifications;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commune", inversedBy="membres")
     */
    private $commune;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Membre", mappedBy="suivreMembre")
     */
    private $membres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MembreBouteille", mappedBy="membre", orphanRemoval=true)
     */
    private $bouteillesMembre;

    public function __construct()
    {
        $this->notifications = new ArrayCollection();
        $this->membres = new ArrayCollection();
        $this->bouteillesMembre = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmailMembre(): string
    {
        return $this->emailMembre;
    }

    public function setEmailMembre(string $emailMembre): self
    {
        $this->emailMembre = $emailMembre;

        return $this;
    }

    /**
     * @return Collection|Notification[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setMembre($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): self
    {
        if ($this->notifications->contains($notification)) {
            $this->notifications->removeElement($notification);
            // set the owning side to null (unless already changed)
            if ($notification->getMembre() === $this) {
                $notification->setMembre(null);
            }
        }

        return $this;
    }

    public function getCommune(): Commune
    {
        return $this->commune;
    }

    public function setCommune(Commune $commune): self
    {
        $this->commune = $commune;

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
            $membre->addSuivreMembre($this);
        }

        return $this;
    }

    public function removeMembre(Membre $membre): self
    {
        if ($this->membres->contains($membre)) {
            $this->membres->removeElement($membre);
            $membre->removeSuivreMembre($this);
        }

        return $this;
    }

    /**
     * @return Collection|MembreBouteille[]
     */
    public function getBouteillesMembre(): Collection
    {
        return $this->bouteillesMembre;
    }

    public function addBouteillesMembre(MembreBouteille $bouteillesMembre): self
    {
        if (!$this->bouteillesMembre->contains($bouteillesMembre)) {
            $this->bouteillesMembre[] = $bouteillesMembre;
            $bouteillesMembre->setMembre($this);
        }

        return $this;
    }

    public function removeBouteillesMembre(MembreBouteille $bouteillesMembre): self
    {
        if ($this->bouteillesMembre->contains($bouteillesMembre)) {
            $this->bouteillesMembre->removeElement($bouteillesMembre);
            // set the owning side to null (unless already changed)
            if ($bouteillesMembre->getMembre() === $this) {
                $bouteillesMembre->setMembre(null);
            }
        }

        return $this;
    }
}
