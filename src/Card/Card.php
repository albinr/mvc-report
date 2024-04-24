<?php

namespace App\Card;

class Card
{
    protected $value;
    protected $suit;
    protected $cardId;

    public function __construct($value, $suit, $cardId)
    {
        $this->value = $value;
        $this->suit = $suit;
        $this->cardId = $cardId;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    public function getId()
    {
        return $this->cardId;
    }

    public function getAsString(): string
    {
        return "{$this->value} of {$this->suit}";
    }
}
