<?php

namespace App\Card;

class CardHand
{
    /**
     * @var Card[] Array of Card objects
     */
    private array $cards = [];

    public function __construct(array $cards = null)
    {
        if (is_array($cards)) {
            $this->cards = array_map(function ($cardData) {
                return new Card($cardData['value'], $cardData['suit'], $cardData['id']);
            }, $cards);
        }
    }

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function showHand(): array
    {
        $hand = [];
        foreach ($this->cards as $card) {
            $hand[] = "{$card->getValue()} of {$card->getSuit()}";
        }
        return $hand;
    }

    public function clearHand(): void
    {
        $this->cards = [];
    }

    public function toArray(): array
    {
        return array_map(function (Card $card) {
            return [
                'value' => $card->getValue(),
                'suit'  => $card->getSuit(),
                'id'    => $card->getId()
            ];
        }, $this->cards);
    }

    public function getRenderedHand(): array
    {
        return array_map(function (Card $card) {
            $cardGraphic = new CardGraphic($card->getValue(), $card->getSuit(), $card->getId());
            return $cardGraphic->render();
        }, $this->cards);
    }
}
