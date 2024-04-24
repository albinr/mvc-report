<?php

namespace App\Card;

class DeckOfCards
{
    protected $cards = [];

    public function __construct(array $cards = null)
    {
        if (is_array($cards)) {
            $this->cards = array_map(function ($cardData) {
                return new Card($cardData['value'], $cardData['suit'], $cardData['id']);
            }, $cards);
        } else {
            $this->initialize();
        }
    }

    protected function initialize()
    {
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
        $count = 1;
        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $this->cards[] = new Card($value, $suit, $count);
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
        usort($this->cards, function ($card1, $card2) {
            return $card1->getId() <=> $card2->getId();
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

    public function toArray()
    {
        return array_map(function (Card $card) {
            return [
                'value' => $card->getValue(),
                'suit'  => $card->getSuit(),
                'id'    => $card->getId()
            ];
        }, $this->cards);
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
