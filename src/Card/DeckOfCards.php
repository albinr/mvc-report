<?php

namespace App\Card;


class DeckOfCards {
    protected $cards = [];

    public function __construct() {
        $this->initialize();
    }

    protected function initialize() {
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace'];

        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $this->cards[] = new Card($value, $suit);
                // $this->cards[] = new CardGraphic($value, $suit);
            }
        }
    }

    public function shuffle() {
        shuffle($this->cards);
    }

    public function dealCard() {
        return array_shift($this->cards);
    }

    public function getCards() {
        return $this->cards;
    }
}

class DeckWithJokers extends DeckOfCards {
    protected function initialize() {
        parent::initialize();
        $this->cards[] = new Card('Joker', 'Black');
        $this->cards[] = new Card('Joker', 'Red');
    }
}
