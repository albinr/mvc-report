<?php

namespace App\Card;

/**
 * Represents a single card in a deck of cards.
 */
class Card
{
    protected string $value;
    protected string $suit;
    protected int $cardId;

    /**
     * Constructor for the Card class.
     *
     * @param string $value The value of the card.
     * @param string $suit The suit of the card
     * @param int $cardId The card's unique identifier.
     */
    public function __construct(string $value, string $suit, int $cardId)
    {
        $this->value = $value;
        $this->suit = $suit;
        $this->cardId = $cardId;
    }

    /**
     * Gets the value of the card.
     *
     * @return string The value of the card.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Gets the suit of the card.
     *
     * @return string The suit of the card.
     */
    public function getSuit(): string
    {
        return $this->suit;
    }

    /**
     * Gets the unique id for the card.
     * (This is used to sort the deck)
     *
     * @return int The id of the card.
     */
    public function getId(): int
    {
        return $this->cardId;
    }

    /**
     * Returns a string representation of the card, combining its value and suit.
     *
     * @return string A string representing the card ("A of Spades").
     */
    public function getAsString(): string
    {
        return "{$this->value} of {$this->suit}";
    }

}
