<?php

namespace App\Card;

class CardGraphic extends Card
{
    private $suitSymbols = [
        'Hearts' => '♥',
        'Diamonds' => '♦',
        'Clubs' => '♣',
        'Spades' => '♠'
    ];

    private $suitColors = [
        'Hearts' => 'red-card',
        'Diamonds' => 'red-card',
        'Clubs' => 'black-card',
        'Spades' => 'black-card'
    ];

    public function __construct($suit, $value)
    {
        parent::__construct($suit, $value, $card_id = null);
    }

    public function render()
    {

        $symbol = $this->suitSymbols[$this->getSuit()] ?? '';
        $color = $this->suitColors[$this->getSuit()] ?? 'black-card';

        return "
    <div class='card {$color}'>
        <div>{$this->getValue()} {$symbol}</div>
        <div>{$this->getValue()} {$symbol}</div>
        <div>{$this->getValue()} {$symbol}</div>
    </div>";
    }
}
