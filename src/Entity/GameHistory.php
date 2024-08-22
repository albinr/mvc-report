<?php

namespace App\Entity;

use App\Repository\GameHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameHistoryRepository::class)]
class GameHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "datetime")]
    private \DateTime $gameDate;

    #[ORM\Column(type: "json")]
    private array $playerDataJson;

    #[ORM\Column]
    private int $bankScore;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGameDate(): \DateTime
    {
        return $this->gameDate;
    }

    public function setGameDate(\DateTime $gameDate): self
    {
        $this->gameDate = $gameDate;
        return $this;
    }

    public function getPlayerDataJson(): array
    {
        return $this->playerDataJson;
    }

    public function setPlayerDataJson(array $playerDataJson): self
    {
        $this->playerDataJson = $playerDataJson;
        return $this;
    }

    public function getBankScore(): int
    {
        return $this->bankScore;
    }

    public function setBankScore(int $bankScore): self
    {
        $this->bankScore = $bankScore;
        return $this;
    }
}
