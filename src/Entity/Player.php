<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Player
 *
 * This class represents a player in the game. It stores the players ID,
 * name, number of wins, and losses.
 */
#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $playerid = null;

    #[ORM\Column(length: 255, type: "string", unique: true)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $wins = 0;

    #[ORM\Column]
    private ?int $losses = 0;

    /**
     * Get the players ID.
     *
     * @return int|null The players ID.
     */
    public function getPlayerId(): ?int
    {
        return $this->playerid;
    }

    /**
     * Get the players name.
     *
     * @return string|null The players name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the players name.
     *
     * @param string $name The players name.
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the number of wins for the player.
     *
     * @return int|null The number of wins.
     */
    public function getWins(): ?int
    {
        return $this->wins;
    }

    /**
     * Set the number of wins for the player.
     *
     * @param int $wins The number of wins.
     * @return static
     */
    public function setWins(int $wins): static
    {
        $this->wins = $wins;

        return $this;
    }

    /**
     * Get the number of losses for the player.
     *
     * @return int|null The number of losses.
     */
    public function getLosses(): ?int
    {
        return $this->losses;
    }

    /**
     * Set the number of losses for the player.
     *
     * @param int $losses The number of losses.
     * @return static
     */
    public function setLosses(int $losses): static
    {
        $this->losses = $losses;

        return $this;
    }
}
