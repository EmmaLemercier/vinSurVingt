<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PointDeVenteRepository")
 */
class PointDeVente
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
    private $raisonSocialePointDeVente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleRuePointDeVente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroRuePointDeVente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephonePointDeVente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailPointDeVente;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heureOuvertureMatinPointDeVente;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heureOuvertureSoirPointDeVente;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heureFermetureSoirPointDeVente;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heureFermetureMatinPointDeVente;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PointDeVenteBouteille", mappedBy="pointDeVente", orphanRemoval=true)
     */
    private $bouteillesPointDeVente;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commune", inversedBy="pointDeVentes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commune;

    public function __construct()
    {
        $this->bouteillesPointDeVente = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRaisonSocialePointDeVente(): string
    {
        return $this->raisonSocialePointDeVente;
    }

    public function setRaisonSocialePointDeVente(string $raisonSocialePointDeVente): self
    {
        $this->raisonSocialePointDeVente = $raisonSocialePointDeVente;

        return $this;
    }

    public function getLibelleRuePointDeVente(): string
    {
        return $this->libelleRuePointDeVente;
    }

    public function setLibelleRuePointDeVente(string $libelleRuePointDeVente): self
    {
        $this->libelleRuePointDeVente = $libelleRuePointDeVente;

        return $this;
    }

    public function getNumeroRuePointDeVente(): string
    {
        return $this->numeroRuePointDeVente;
    }

    public function setNumeroRuePointDeVente(string $numeroRuePointDeVente): self
    {
        $this->numeroRuePointDeVente = $numeroRuePointDeVente;

        return $this;
    }

    public function getTelephonePointDeVente(): string
    {
        return $this->telephonePointDeVente;
    }

    public function setTelephonePointDeVente(string $telephonePointDeVente): self
    {
        $this->telephonePointDeVente = $telephonePointDeVente;

        return $this;
    }

    public function getEmailPointDeVente(): string
    {
        return $this->emailPointDeVente;
    }

    public function setEmailPointDeVente(string $emailPointDeVente): self
    {
        $this->emailPointDeVente = $emailPointDeVente;

        return $this;
    }

    public function getHeureOuvertureMatinPointDeVente(): \DateTimeInterface
    {
        return $this->heureOuvertureMatinPointDeVente;
    }

    public function setHeureOuvertureMatinPointDeVente(\DateTimeInterface $heureOuvertureMatinPointDeVente): self
    {
        $this->heureOuvertureMatinPointDeVente = $heureOuvertureMatinPointDeVente;

        return $this;
    }

    public function getHeureOuvertureSoirPointDeVente(): \DateTimeInterface
    {
        return $this->heureOuvertureSoirPointDeVente;
    }

    public function setHeureOuvertureSoirPointDeVente(\DateTimeInterface $heureOuvertureSoirPointDeVente): self
    {
        $this->heureOuvertureSoirPointDeVente = $heureOuvertureSoirPointDeVente;

        return $this;
    }

    public function getHeureFermetureSoirPointDeVente(): \DateTimeInterface
    {
        return $this->heureFermetureSoirPointDeVente;
    }

    public function setHeureFermetureSoirPointDeVente(\DateTimeInterface $heureFermetureSoirPointDeVente): self
    {
        $this->heureFermetureSoirPointDeVente = $heureFermetureSoirPointDeVente;

        return $this;
    }

    public function getHeureFermetureMatinPointDeVente(): \DateTimeInterface
    {
        return $this->heureFermetureMatinPointDeVente;
    }

    public function setHeureFermetureMatinPointDeVente(\DateTimeInterface $heureFermetureMatinPointDeVente): self
    {
        $this->heureFermetureMatinPointDeVente = $heureFermetureMatinPointDeVente;

        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|PointDeVenteBouteille[]
     */
    public function getBouteillesPointDeVente(): Collection
    {
        return $this->bouteillesPointDeVente;
    }

    public function addBouteillesPointDeVente(PointDeVenteBouteille $bouteillesPointDeVente): self
    {
        if (!$this->bouteillesPointDeVente->contains($bouteillesPointDeVente)) {
            $this->bouteillesPointDeVente[] = $bouteillesPointDeVente;
            $bouteillesPointDeVente->setPointDeVente($this);
        }

        return $this;
    }

    public function removeBouteillesPointDeVente(PointDeVenteBouteille $bouteillesPointDeVente): self
    {
        if ($this->bouteillesPointDeVente->contains($bouteillesPointDeVente)) {
            $this->bouteillesPointDeVente->removeElement($bouteillesPointDeVente);
            // set the owning side to null (unless already changed)
            if ($bouteillesPointDeVente->getPointDeVente() === $this) {
                $bouteillesPointDeVente->setPointDeVente(null);
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
}
