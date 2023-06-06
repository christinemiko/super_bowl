<?php

namespace App\Entity;

use App\Repository\FootballMatchRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FootballMatchRepository::class)]
class FootballMatch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $match_date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $hour_start = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $hour_finish = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $weather = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $score_game = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comments = null;

    #[ORM\Column(nullable: true)]
    private ?int $team1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $team2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatchDate(): ?\DateTimeInterface
    {
        return $this->match_date;
    }

    public function setMatchDate(\DateTimeInterface $match_date): self
    {
        $this->match_date = $match_date;

        return $this;
    }

    public function getHourStart(): ?\DateTimeInterface
    {
        return $this->hour_start;
    }

    public function setHourStart(\DateTimeInterface $hour_start): self
    {
        $this->hour_start = $hour_start;

        return $this;
    }

    public function getHourFinish(): ?\DateTimeInterface
    {
        return $this->hour_finish;
    }

    public function setHourFinish(\DateTimeInterface $hour_finish): self
    {
        $this->hour_finish = $hour_finish;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getWeather(): ?string
    {
        return $this->weather;
    }

    public function setWeather(?string $weather): self
    {
        $this->weather = $weather;

        return $this;
    }

    public function getScoreGame(): ?string
    {
        return $this->score_game;
    }

    public function setScoreGame(?string $score_game): self
    {
        $this->score_game = $score_game;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getTeam1(): ?int
    {
        return $this->team1;
    }

    public function setTeam1(?int $team1): self
    {
        $this->team1 = $team1;

        return $this;
    }

    public function getTeam2(): ?int
    {
        return $this->team2;
    }

    public function setTeam2(?int $team2): self
    {
        $this->team2 = $team2;

        return $this;
    }
}
