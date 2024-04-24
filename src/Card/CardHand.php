<?php

namespace App\Card;

class CardHand
{
    private $cards = [];

    public function __construct(array $cards = null)
    {
        if (is_array($cards)) {
            $this->cards = array_map(function ($cardData) {
                return new Card($cardData['value'], $cardData['suit'], $cardData['id']);
            }, $cards);
        }
    }

    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    public function getCards()
    {
        return $this->cards;
    }

    public function showHand()
    {
        $hand = [];
        foreach ($this->cards as $card) {
            $hand[] = "{$card->getValue()} of {$card->getSuit()}";
        }
        return $hand;
    }

    public function clearHand()
    {
        $this->cards = [];
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
}
