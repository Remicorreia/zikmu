<?php

namespace App\Entity;

use App\Repository\StatistiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatistiqueRepository::class)]
class Statistique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $signification = null;

    #[ORM\OneToMany(mappedBy: 'statistique', targetEntity: Carte::class)]
    private Collection $cartes;

    #[ORM\OneToMany(mappedBy: 'stat', targetEntity: SousStatistique::class)]
    private Collection $sousStatistiques;


    public function __construct()
    {
        $this->cartes = new ArrayCollection();
        $this->sousStatistiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSignification(): ?string
    {
        return $this->signification;
    }

    public function setSignification(string $signification): self
    {
        $this->signification = $signification;

        return $this;
    }

    /**
     * @return Collection<int, Carte>
     */
    public function getCartes(): Collection
    {
        return $this->cartes;
    }

    public function addCarte(Carte $carte): self
    {
        if (!$this->cartes->contains($carte)) {
            $this->cartes->add($carte);
            $carte->setStatistique($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        if ($this->cartes->removeElement($carte)) {
            // set the owning side to null (unless already changed)
            if ($carte->getStatistique() === $this) {
                $carte->setStatistique(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SousStatistique>
     */
    public function getSousStatistiques(): Collection
    {
        return $this->sousStatistiques;
    }

    public function addSousStatistique(SousStatistique $sousStatistique): self
    {
        if (!$this->sousStatistiques->contains($sousStatistique)) {
            $this->sousStatistiques->add($sousStatistique);
            $sousStatistique->setStat($this);
        }

        return $this;
    }

    public function removeSousStatistique(SousStatistique $sousStatistique): self
    {
        if ($this->sousStatistiques->removeElement($sousStatistique)) {
            // set the owning side to null (unless already changed)
            if ($sousStatistique->getStat() === $this) {
                $sousStatistique->setStat(null);
            }
        }

        return $this;
    }
}
