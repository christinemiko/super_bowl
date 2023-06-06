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
    private ?\DateTimeInterface $datewagerMade = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $moneyGain = null;

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

    public function getDatewagerMade(): ?\DateTimeInterface
    {
        return $this->datewagerMade;
    }

    public function setDatewagerMade(\DateTimeInterface $datewagerMade): self
    {
        $this->datewagerMade = $datewagerMade;

        return $this;
    }

    public function getMoneyGain(): ?string
    {
        return $this->moneyGain;
    }

    public function setMoneyGain(?string $moneyGain): self
    {
        $this->moneyGain = $moneyGain;

        return $this;
    }

}
