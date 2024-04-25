<?php

namespace App\Card;

class Card
{
    protected string $value;
    protected string $suit;
    protected int $cardId;

    public function __construct(string $value, string $suit, int $cardId)
    {
        $this->value = $value;
        $this->suit = $suit;
        $this->cardId = $cardId;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getId(): int
    {
        return $this->cardId;
    }

    public function getAsString(): string
    {
        return "{$this->value} of {$this->suit}";
    }
}
