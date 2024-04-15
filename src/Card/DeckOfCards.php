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
        $suits = ['Diamonds', 'Clubs', 'Hearts', 'Spades'];
        $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace'];
        $count = 0;
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
            return strcmp($a->getId(), $b->getId());
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
        $this->cards[] = new Card('Joker', 'Black', 52);
        $this->cards[] = new Card('Joker', 'Red', 53);
    }
}
