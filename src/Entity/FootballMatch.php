<?php

namespace App\Entity;

use App\Repository\FootballMatchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FootballMatchRepository::class)]
class FootballMatch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /**
     * @Groups("footballmatch")
     */
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    /**
     * @Groups("footballmatch")
     */
    private ?\DateTimeInterface $matchDate = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    /**
     * @Groups("footballmatch")
     */
    private ?\DateTimeInterface $hourStart = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    /**
     * @Groups("footballmatch")
     */
    private ?\DateTimeInterface $hourFinish = null;

    #[ORM\Column(length: 50)]
    /**
     * @Groups("footballmatch")
     */
    private ?string $statut = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $weather = null;

    #[ORM\Column(length: 100, nullable: true)]
    /**
     * @Groups("footballmatch")
     */
    private ?int $scoreTeam1 = null;

    #[ORM\Column(length: 3, nullable: true)]
    /**
     * @Groups("footballmatch")
     */
    private ?int $scoreTeam2 = null;

    #[ORM\Column(length: 3, nullable: true)]
    /**
     * @Groups("footballmatch")
     */
    private ?string $comments = null;

    #[ORM\ManyToOne(inversedBy: 'team1')]
    #[ORM\JoinColumn(nullable: false)]
    /**
     * @Groups("footballmatch")
     */
    private ?Team $team1 = null;

    #[ORM\ManyToOne(inversedBy: 'team2')]
    #[ORM\JoinColumn(nullable: false)]
    /**
     * @Groups("footballmatch")
     */
    private ?Team $team2 = null;

    #[ORM\OneToMany(mappedBy: 'footballMatch', targetEntity: Sportbet::class)]
    private Collection $footballMatch;

    #[ORM\Column]
    private ?bool $deleted = false;

    public function __construct()
    {
        $this->footballMatch = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatchDate(): ?\DateTimeInterface
    {
        return $this->matchDate;
    }

    public function setMatchDate(\DateTimeInterface $matchDate): self
    {
        $this->matchDate = $matchDate;

        return $this;
    }

    public function getHourStart(): ?\DateTimeInterface
    {
        return $this->hourStart;
    }

    public function setHourStart(\DateTimeInterface $hourStart): self
    {
        $this->hourStart = $hourStart;

        return $this;
    }

    public function getHourFinish(): ?\DateTimeInterface
    {
        return $this->hourFinish;
    }

    public function setHourFinish(\DateTimeInterface $hourFinish): self
    {
        $this->hourFinish = $hourFinish;

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

    public function getScoreTeam1(): ?int
    {
        return $this->scoreTeam1;
    }

    public function setScoreTeam1(?int $scoreTeam1): self
    {
        $this->scoreTeam1 = $scoreTeam1;

        return $this;
    }
    public function getScoreTeam2(): ?int
    {
        return $this->scoreTeam2;
    }

    public function setScoreTeam2(?int $scoreTeam2): self
    {
        $this->scoreTeam2 = $scoreTeam2;

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

    public function getTeam1(): ?Team
    {
        return $this->team1;
    }

    public function setTeam1(?Team $team1): self
    {
        $this->team1 = $team1;

        return $this;
    }

    public function getTeam2(): ?Team
    {
        return $this->team2;
    }

    public function setTeam2(?Team $team2): self
    {
        $this->team2 = $team2;

        return $this;
    }

    /**
     * @return Collection<int, Sportbet>
     */
    public function getFootballMatch(): Collection
    {
        return $this->footballMatch;
    }

    public function addFootballMatch(Sportbet $footballMatch): self
    {
        if (!$this->footballMatch->contains($footballMatch)) {
            $this->footballMatch->add($footballMatch);
            $footballMatch->setFootballMatch($this);
        }

        return $this;
    }

    public function removeFootballMatch(Sportbet $footballMatch): self
    {
        if ($this->footballMatch->removeElement($footballMatch)) {
            // set the owning side to null (unless already changed)
            if ($footballMatch->getFootballMatch() === $this) {
                $footballMatch->setFootballMatch(null);
            }
        }

        return $this;
    }

   //Recupérer le nom de chaque équipe Crud Controller FottballMatch
    public function getTeam1Name(): ?string
    {
        if ($this->team1 !== null) {
            return $this->team1->getTeamName();
        }

        return null;
    }

    public function getTeam2Name(): ?string
    {
        if ($this->team2 !== null) {
            return $this->team2->getTeamName();
        }

        return null;
    }

    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }
}
