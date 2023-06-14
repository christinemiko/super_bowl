<?php

namespace App\Entity;

use App\Repository\SportbetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SportbetRepository::class)]
class Sportbet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $wagerMade = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateWagerMade = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?int $moneyGain = null;

    #[ORM\ManyToOne(inversedBy: 'sportbets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'team_bet')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $team = null;

    #[ORM\ManyToOne(inversedBy: 'FootballMatch')]
    #[ORM\JoinColumn(nullable: false)]
    private ?FootballMatch $footballMatch = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWagerMade(): ?int
    {
        return $this->wagerMade;
    }

    public function setWagerMade(int $wagerMade): self
    {
        $this->wagerMade = $wagerMade;

        return $this;
    }

    public function getDateWagerMade(): ?\DateTimeInterface
    {
        return $this->dateWagerMade;
    }

    public function setDateWagerMade(\DateTimeInterface $dateWagerMade): self
    {
        $this->dateWagerMade = $dateWagerMade;

        return $this;
    }

    public function getMoneyGain(): ?int
    {
        return $this->moneyGain;
    }

    public function setMoneyGain(?int $moneyGain): self
    {
        $this->moneyGain = $moneyGain;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getFootballMatch(): ?FootballMatch
    {
        return $this->footballMatch;
    }

    public function setFootballMatch(?FootballMatch $footballMatch): self
    {
        $this->footballMatch = $footballMatch;

        return $this;
    }

}
