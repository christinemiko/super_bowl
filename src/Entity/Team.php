<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $teamName = null;

    #[ORM\Column(length: 50)]
    private ?string $regionOrigin = null;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: FootballPlayer::class)]
    private Collection $team;

    #[ORM\OneToMany(mappedBy: 'team1', targetEntity: FootballMatch::class)]
    private Collection $team1;

    #[ORM\OneToMany(mappedBy: 'team2', targetEntity: FootballMatch::class)]
    private Collection $team2;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: Sportbet::class)]
    private Collection $team_bet;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 2)]
    private ?string $oddsteam = null;

    public function __construct()
    {
        $this->team = new ArrayCollection();
        $this->team1 = new ArrayCollection();
        $this->team2 = new ArrayCollection();
        $this->team_bet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamName(): ?string
    {
        return $this->teamName;
    }

    public function setTeamName(string $teamName): self
    {
        $this->teamName = $teamName;

        return $this;
    }

    public function getRegionOrigin(): ?string
    {
        return $this->regionOrigin;
    }

    public function setRegionOrigin(string $regionOrigin): self
    {
        $this->regionOrigin = $regionOrigin;

        return $this;
    }

    /**
     * @return Collection<int, FootballPlayer>
     */
    public function getTeam(): Collection
    {
        return $this->team;
    }

    public function addTeam(FootballPlayer $team): self
    {
        if (!$this->team->contains($team)) {
            $this->team->add($team);
            $team->setTeam($this);
        }

        return $this;
    }

    public function removeTeam(FootballPlayer $team): self
    {
        if ($this->team->removeElement($team)) {
            // set the owning side to null (unless already changed)
            if ($team->getTeam() === $this) {
                $team->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FootballMatch>
     */
    public function getTeam1(): Collection
    {
        return $this->team1;
    }

    public function addTeam1(FootballMatch $team1): self
    {
        if (!$this->team1->contains($team1)) {
            $this->team1->add($team1);
            $team1->setTeam1($this);
        }

        return $this;
    }

    public function removeTeam1(FootballMatch $team1): self
    {
        if ($this->team1->removeElement($team1)) {
            // set the owning side to null (unless already changed)
            if ($team1->getTeam1() === $this) {
                $team1->setTeam1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FootballMatch>
     */
    public function getTeam2(): Collection
    {
        return $this->team2;
    }

    public function addTeam2(FootballMatch $team2): self
    {
        if (!$this->team2->contains($team2)) {
            $this->team2->add($team2);
            $team2->setTeam2($this);
        }

        return $this;
    }

    public function removeTeam2(FootballMatch $team2): self
    {
        if ($this->team2->removeElement($team2)) {
            // set the owning side to null (unless already changed)
            if ($team2->getTeam2() === $this) {
                $team2->setTeam2(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sportbet>
     */
    public function getTeamBet(): Collection
    {
        return $this->team_bet;
    }

    public function addTeamBet(Sportbet $teamBet): self
    {
        if (!$this->team_bet->contains($teamBet)) {
            $this->team_bet->add($teamBet);
            $teamBet->setTeam($this);
        }

        return $this;
    }

    public function removeTeamBet(Sportbet $teamBet): self
    {
        if ($this->team_bet->removeElement($teamBet)) {
            // set the owning side to null (unless already changed)
            if ($teamBet->getTeam() === $this) {
                $teamBet->setTeam(null);
            }
        }

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getOddsteam(): ?string
    {
        return $this->oddsteam;
    }

    public function setOddsteam(string $oddsteam): self
    {
        $this->oddsteam = $oddsteam;

        return $this;
    }


}
