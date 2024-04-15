<?php

namespace App\Card;

class Card
{
    protected $value;
    protected $suit;
    protected $card_id;

    public function __construct($value, $suit, $card_id)
    {
        $this->value = $value;
        $this->suit = $suit;
        $this->card_id = $card_id;
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
        return $this->card_id;
    }

    public function getAsString(): string
    {
        return "{$this->value} of {$this->suit}";
    }
}
