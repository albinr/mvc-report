<?php

namespace App\Card;

class DeckOfCards
{
    protected array $cards = [];
    protected int $numDecks;


    /**
     * Constructor initializes the deck with the specified number of decks.
     *
     * @param int $numDecks The number of decks to include (default is 1).
     * @param array|null $cards An optional array of cards to initialize the deck with.
     */
    public function __construct(int $numDecks = 1, array $cards = null)
    {
        $this->numDecks = $numDecks;
        if (is_array($cards)) {
            $this->cards = array_map(function ($cardData) {
                return new Card($cardData['value'], $cardData['suit'], $cardData['id']);
            }, $cards);
            return;
        }

        $this->initialize();
    }


    /**
     * Initializes the deck with the specified number of decks.
     */
    protected function initialize(): void
    {
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
        $count = 1;

        for ($deck = 0; $deck < $this->numDecks; $deck++) {
            foreach ($suits as $suit) {
                foreach ($values as $value) {
                    $this->cards[] = new Card($value, $suit, $count);
                    $count++;
                }
            }
        }
    }

    public function shuffleDeck(): void
    {
        shuffle($this->cards);
    }

    public function sortDeck(): void
    {
        usort($this->cards, function ($card1, $card2) {
            return $card1->getId() <=> $card2->getId();
        });
    }

    public function dealCard(): ?Card
    {
        return array_shift($this->cards) ?: null;
    }

    public function getCards(): array
    {
        return $this->cards;
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

    public function __toString(): string
    {
        return 'Deck of Cards: ' . count($this->cards) . ' cards remaining';
    }
}
