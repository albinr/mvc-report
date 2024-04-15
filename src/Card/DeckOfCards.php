<?php

namespace App\Card;

class DeckOfCards
{
    protected $cards = [];

    public function __construct()
    {
        $this->initialize();
    }

    protected function initialize()
    {
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
        $count = 1;
        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $this->cards[] = new Card($value, $suit, $count);
                // $this->cards[] = new CardGraphic($value, $suit);
                $count++;
            }
        }
    }

    public function shuffle()
    {
        shuffle($this->cards);
    }

    public function sort()
    {
        usort($this->cards, function ($a, $b) {
            return $a->getId() <=> $b->getId();
        });
    }

    public function dealCard()
    {
        return array_shift($this->cards);
    }

    public function getCards()
    {
        return $this->cards;
    }

    public function __toString()
    {
        return 'Deck of Cards: ' . count($this->cards) . ' cards remaining';
    }
}
class DeckWithJokers extends DeckOfCards
{
    protected function initialize()
    {
        parent::initialize();
        $this->cards[] = new Card('Joker', 'Black', 53);
        $this->cards[] = new Card('Joker', 'Red', 54);
    }
}
