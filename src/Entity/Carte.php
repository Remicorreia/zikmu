<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteRepository::class)]
class Carte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cartes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Statistique $statistique = null;

    #[ORM\ManyToOne(inversedBy: 'cartes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SousStatistique $sousStatistique = null;

    #[ORM\ManyToOne(inversedBy: 'cartes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Artiste $artiste = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(nullable: true)]
    private ?int $coefficient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatistique(): ?Statistique
    {
        return $this->statistique;
    }

    public function setStatistique(?Statistique $statistique): self
    {
        $this->statistique = $statistique;

        return $this;
    }

    public function getSousStatistique(): ?SousStatistique
    {
        return $this->sousStatistique;
    }

    public function setSousStatistique(?SousStatistique $sousStatistique): self
    {
        $this->sousStatistique = $sousStatistique;

        return $this;
    }

    public function getArtiste(): ?Artiste
    {
        return $this->artiste;
    }

    public function setArtiste(?Artiste $artiste): self
    {
        $this->artiste = $artiste;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getCoefficient(): ?int
    {
        return $this->coefficient;
    }

    public function setCoefficient(?int $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }
}
