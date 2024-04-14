<?php

namespace App\Card;

class Card
{
    protected $value;
    protected $suit;

    public function __construct($value, $suit)
    {
        $this->value = $value;
        $this->suit = $suit;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    public function getAsString(): string
    {
        return "[{$this->suit} {$this->value}]";
    }
}
