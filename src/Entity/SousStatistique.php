<?php

namespace App\Entity;

use App\Repository\SousStatistiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousStatistiqueRepository::class)]
class SousStatistique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\OneToMany(mappedBy: 'sousStatistique', targetEntity: Carte::class)]
    private Collection $cartes;

    #[ORM\ManyToOne(inversedBy: 'sousStatistiques')]
    private ?Statistique $stat = null;


    public function __construct()
    {
        $this->cartes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

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
            $carte->setSousStatistique($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): self
    {
        if ($this->cartes->removeElement($carte)) {
            // set the owning side to null (unless already changed)
            if ($carte->getSousStatistique() === $this) {
                $carte->setSousStatistique(null);
            }
        }

        return $this;
    }

    public function getStat(): ?Statistique
    {
        return $this->stat;
    }

    public function setStat(?Statistique $stat): self
    {
        $this->stat = $stat;

        return $this;
    }

}
