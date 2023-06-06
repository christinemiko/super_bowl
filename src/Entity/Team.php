<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $team_name = null;

    #[ORM\Column]
    private ?int $number_player = null;

    #[ORM\Column]
    private ?float $oddsteam = null;

    #[ORM\Column(length: 50)]
    private ?string $country_origin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamName(): ?string
    {
        return $this->team_name;
    }

    public function setTeamName(string $team_name): self
    {
        $this->team_name = $team_name;

        return $this;
    }

    public function getNumberPlayer(): ?int
    {
        return $this->number_player;
    }

    public function setNumberPlayer(int $number_player): self
    {
        $this->number_player = $number_player;

        return $this;
    }

    public function getOddsteam(): ?float
    {
        return $this->oddsteam;
    }

    public function setOddsteam(float $oddsteam): self
    {
        $this->oddsteam = $oddsteam;

        return $this;
    }

    public function getCountryOrigin(): ?string
    {
        return $this->country_origin;
    }

    public function setCountryOrigin(string $country_origin): self
    {
        $this->country_origin = $country_origin;

        return $this;
    }

}
