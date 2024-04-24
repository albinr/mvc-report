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

    public function __construct($suit, $value, $cardId)
    {
        parent::__construct($suit, $value, $cardId);
    }

    public function render()
    {

        $symbol = $this->suitSymbols[$this->getSuit()] ?? '';
        $color = $this->suitColors[$this->getSuit()] ?? 'black-card';

        return "
    <div class='card {$color}'>
        <div class='card-top'><span>{$this->getValue()}</span> <span>{$symbol}</span></div>
        <div>{$symbol} {$this->getValue()}</div>
        <div class='card-bottom'><span>{$this->getValue()}</span> <span>{$symbol}</span></div>
    </div>";
    }
}
