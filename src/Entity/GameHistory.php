<?php

namespace App\Entity;

use App\Repository\GameHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class GameHistory
 * 
 * This class represents the history of a game, storing information
 * about the game such as date, player data, and bank score.
 */
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

    /**
     * Get the ID of the game history record.
     *
     * @return int|null The ID of the record
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the date and time of the game
     *
     * @return \DateTime The date of the game.
     */
    public function getGameDate(): \DateTime
    {
        return $this->gameDate;
    }

    /**
     * Set the date and time of the game
     *
     * @param \DateTime $gameDate The date of the game.
     * @return self
     */
    public function setGameDate(\DateTime $gameDate): self
    {
        $this->gameDate = $gameDate;
        return $this;
    }

    /**
     * Get the player data stored as JSON.
     *
     * @return array The player data as an array.
     */
    public function getPlayerDataJson(): array
    {
        return $this->playerDataJson;
    }

    /**
     * Set the player data stored as JSON.
     *
     * @param array $playerDataJson The player data as an array.
     * @return self
     */
    public function setPlayerDataJson(array $playerDataJson): self
    {
        $this->playerDataJson = $playerDataJson;
        return $this;
    }

    /**
     * Get the score of the bank.
     *
     * @return int The banks score.
     */
    public function getBankScore(): int
    {
        return $this->bankScore;
    }

    /**
     * Set the score of the bank
     *
     * @param int $bankScore The banks score.
     * @return self
     */
    public function setBankScore(int $bankScore): self
    {
        $this->bankScore = $bankScore;
        return $this;
    }
}
