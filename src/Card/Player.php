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


    public function __construct(int $dbId, string $name)
    {
        $this->dbId = $dbId;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->dbId;
    }

    public function getHands(): array
    {
        return $this->hands;
    }

    public function setHand(int $handIndex, CardHand $hand): void
    {
        $this->hands[$handIndex] = $hand;
    }

    public function addHand(CardHand $hand): void
    {
        $this->hands[] = $hand;
    }

    public function getHand(int $handIndex): CardHand
    {
        return $this->hands[$handIndex];
    }

    public function setResult(int $handIndex, string $result): void
    {
        $this->results[$handIndex] = $result;
    }

    public function getResult(int $handIndex): ?string
    {
        return $this->results[$handIndex] ?? null;
    }

    public function getResults(): array
    {
        return $this->results;
    }
}
