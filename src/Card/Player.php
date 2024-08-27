<?php

namespace App\Card;

/**
 * Class Player
 */
class Player
{
    private string $name;
    private int $dbId;
    private array $results = [];
    private array $hands = [];

    /**
     * Player constructor.
     *
     * @param int $dbId The database ID of the player.
     * @param string $name The name of the player.
     * @param int $numHands The number of hands the player starts with.
     */
    public function __construct(int $dbId, string $name, int $numHands = 1)
    {
        $this->dbId = $dbId;
        $this->name = $name;

        for ($i = 0; $i < $numHands; $i++) {
            $this->addHand(new CardHand());
        }
    }

    /**
     * Gets the name of the player.
     *
     * @return string The name of the player.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets the database ID of the player.
     *
     * @return int The database ID of the player.
     */
    public function getId(): int
    {
        return $this->dbId;
    }

    /**
     * Gets all hands held by the player.
     *
     * @return array An array of CardHand objects representing the player's hands.
     */
    public function getHands(): array
    {
        return $this->hands;
    }

    /**
     * Sets a specific hand by index.
     *
     * @param int $handIndex The index of the hand to set.
     * @param CardHand $hand The CardHand object to set at the specified index.
     */
    public function setHand(int $handIndex, CardHand $hand): void
    {
        $this->hands[$handIndex] = $hand;
    }

    /**
     * Adds a new hand to the player.
     *
     * @param CardHand $hand The hand to add.
     */
    public function addHand(CardHand $hand): void
    {
        $this->hands[] = $hand;
        $this->results[] = null;
    }

    /**
     * Gets a specific hand by index.
     *
     * @param int $handIndex The index of the hand to retrieve.
     * @return CardHand The hand at the specified index.
     */
    public function getHand(int $handIndex): CardHand
    {
        return $this->hands[$handIndex];
    }

    /**
     * Sets the result for a specific hand.
     *
     * @param int $handIndex The index of the hand.
     * @param string $result The result to set ("win", "loss", "draw").
     */
    public function setResult(int $handIndex, string $result): void
    {
        $this->results[$handIndex] = $result;
    }

    /**
     * Gets the result for a specific hand.
     *
     * @param int $handIndex The index of the hand.
     * @return string|null The result of the hand or null if not set.
     */
    public function getResult(int $handIndex): ?string
    {
        return $this->results[$handIndex] ?? null;
    }

    /**
     * Gets all results for the players hands.
     *
     * @return array An array of results for all hands.
     */
    public function getResults(): array
    {
        return $this->results;
    }
}
