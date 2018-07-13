<?php

namespace App\Entity;

use App\Repository\BouteilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BouteilleRepository")
 */
class Bouteille
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
    private $appellationBouteille;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $codeBarreBouteille;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $capaciteGardeBouteille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $millesime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $provenance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $signeOfficielQualite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $teinte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $teneurSucre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tranquillite;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1)
     */
    private $teneurAlcool;

    /**
     * @ORM\OneToMany(targetEntity="BouteilleMets", mappedBy="bouteille", orphanRemoval=true)
     */
    private $metsBouteille;

    /**
     * @ORM\OneToMany(targetEntity="BouteilleVolume", mappedBy="bouteille", orphanRemoval=true)
     */
    private $volumesBouteille;

    /**
     * @ORM\OneToMany(targetEntity="BouteilleCepage", mappedBy="bouteille", orphanRemoval=true)
     */
    private $cepagesBouteille;

    /**
     * @ORM\OneToMany(targetEntity="PointDeVenteBouteille", mappedBy="bouteille", orphanRemoval=true)
     */
    private $pointsDeVenteBouteille;

    /**
     * @ORM\OneToMany(targetEntity="MembreBouteille", mappedBy="bouteille", orphanRemoval=true)
     */
    private $membresBouteille;

    public function __construct()
    {
        $this->metsBouteille = new ArrayCollection();
        $this->volumesBouteille = new ArrayCollection();
        $this->cepagesBouteille = new ArrayCollection();
        $this->pointsDeVenteBouteille = new ArrayCollection();
        $this->membresBouteille = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAppellationBouteille()
    {
        return $this->appellationBouteille;
    }

    public function setAppellationBouteille(string $appellationBouteille): self
    {
        $this->appellationBouteille = $appellationBouteille;

        return $this;
    }

    public function getCodeBarreBouteille()
    {
        return $this->codeBarreBouteille;
    }

    public function setCodeBarreBouteille($codeBarreBouteille): self
    {
        $this->codeBarreBouteille = $codeBarreBouteille;

        return $this;
    }

    public function getCapaciteGardeBouteille(): int
    {
        return $this->capaciteGardeBouteille;
    }

    public function setCapaciteGardeBouteille(int $capaciteGardeBouteille): self
    {
        $this->capaciteGardeBouteille = $capaciteGardeBouteille;

        return $this;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getMillesime()
    {
        return $this->millesime;
    }

    public function setMillesime(int $millesime): self
    {
        $this->millesime = $millesime;

        return $this;
    }

   public function getProvenance(): string
    {
        return $this->provenance;
    }

    public function setProvenance(string $provenance): self
    {
        $this->provenance = $provenance;

        return $this;
    }

    public function getSigneOfficielQualite(): string
    {
        return $this->signeOfficielQualite;
    }

    public function setSigneOfficielQualite(string $signeOfficielQualite): self
    {
        $this->signeOfficielQualite = $signeOfficielQualite;

        return $this;
    }

    public function getTeinte()
    {
        return $this->teinte;
    }

    public function setTeinte(string $teinte): self
    {
        $this->teinte = $teinte;

        return $this;
    }

    public function getTeneurSucre(): string
    {
        return $this->teneurSucre;
    }

    public function setTeneurSucre(string $teneurSucre): self
    {
        $this->teneurSucre = $teneurSucre;

        return $this;
    }

    public function getTranquillite(): bool
    {
        return $this->tranquillite;
    }

    public function setTranquillite(bool $tranquillite): self
    {
        $this->tranquillite = $tranquillite;

        return $this;
    }

    public function getTeneurAlcool()
    {
        return $this->teneurAlcool;
    }

    public function setTeneurAlcool($teneurAlcool): self
    {
        $this->teneurAlcool = $teneurAlcool;

        return $this;
    }

    /**
     * @return Collection|BouteilleMets[]
     */
    public function getMetsBouteille(): Collection
    {
        return $this->metsBouteille;
    }

    public function addMetsBouteille(BouteilleMets $metsBouteille): self
    {
        if (!$this->metsBouteille->contains($metsBouteille)) {
            $this->metsBouteille[] = $metsBouteille;
            $metsBouteille->setBouteille($this);
        }

        return $this;
    }

    public function removeMetsBouteille(BouteilleMets $metsBouteille): self
    {
        if ($this->metsBouteille->contains($metsBouteille)) {
            $this->metsBouteille->removeElement($metsBouteille);
            // set the owning side to null (unless already changed)
            if ($metsBouteille->getBouteille() === $this) {
                $metsBouteille->setBouteille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BouteilleVolume[]
     */
    public function getVolumesBouteille(): Collection
    {
        return $this->volumesBouteille;
    }

    public function addVolumesBouteille(BouteilleVolume $volumesBouteille): self
    {
        if (!$this->volumesBouteille->contains($volumesBouteille)) {
            $this->volumesBouteille[] = $volumesBouteille;
            $volumesBouteille->setBouteille($this);
        }

        return $this;
    }

    public function removeVolumesBouteille(BouteilleVolume $volumesBouteille): self
    {
        if ($this->volumesBouteille->contains($volumesBouteille)) {
            $this->volumesBouteille->removeElement($volumesBouteille);
            // set the owning side to null (unless already changed)
            if ($volumesBouteille->getBouteille() === $this) {
                $volumesBouteille->setBouteille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BouteilleCepage[]
     */
    public function getCepagesBouteille(): Collection
    {
        return $this->cepagesBouteille;
    }

    public function addCepagesBouteille(BouteilleCepage $cepagesBouteille): self
    {
        if (!$this->cepagesBouteille->contains($cepagesBouteille)) {
            $this->cepagesBouteille[] = $cepagesBouteille;
            $cepagesBouteille->setBouteille($this);
        }

        return $this;
    }

    public function removeCepagesBouteille(BouteilleCepage $cepagesBouteille): self
    {
        if ($this->cepagesBouteille->contains($cepagesBouteille)) {
            $this->cepagesBouteille->removeElement($cepagesBouteille);
            // set the owning side to null (unless already changed)
            if ($cepagesBouteille->getBouteille() === $this) {
                $cepagesBouteille->setBouteille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PointDeVenteBouteille[]
     */
    public function getPointsDeVenteBouteille(): Collection
    {
        return $this->pointsDeVenteBouteille;
    }

    public function addPointsDeVenteBouteille(PointDeVenteBouteille $pointsDeVenteBouteille): self
    {
        if (!$this->pointsDeVenteBouteille->contains($pointsDeVenteBouteille)) {
            $this->pointsDeVenteBouteille[] = $pointsDeVenteBouteille;
            $pointsDeVenteBouteille->setBouteille($this);
        }

        return $this;
    }

    public function removePointsDeVenteBouteille(PointDeVenteBouteille $pointsDeVenteBouteille): self
    {
        if ($this->pointsDeVenteBouteille->contains($pointsDeVenteBouteille)) {
            $this->pointsDeVenteBouteille->removeElement($pointsDeVenteBouteille);
            // set the owning side to null (unless already changed)
            if ($pointsDeVenteBouteille->getBouteille() === $this) {
                $pointsDeVenteBouteille->setBouteille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MembreBouteille[]
     */
    public function getMembresBouteille(): Collection
    {
        return $this->membresBouteille;
    }

    public function addMembresBouteille(MembreBouteille $membresBouteille): self
    {
        if (!$this->membresBouteille->contains($membresBouteille)) {
            $this->membresBouteille[] = $membresBouteille;
            $membresBouteille->setBouteille($this);
        }

        return $this;
    }

    public function removeMembresBouteille(MembreBouteille $membresBouteille): self
    {
        if ($this->membresBouteille->contains($membresBouteille)) {
            $this->membresBouteille->removeElement($membresBouteille);
            // set the owning side to null (unless already changed)
            if ($membresBouteille->getBouteille() === $this) {
                $membresBouteille->setBouteille(null);
            }
        }

        return $this;
    }
}
