<?php

namespace App\Card;

// use App\Card\DeckOfCards;
// use App\Card\CardHand;

/**
 * Class TwentyOne handles the game logic for the game 21.
 */
class TwentyOne
{
    private DeckOfCards $deck;
    private CardHand $playerHand;
    private CardHand $bankHand;
    private string $status;


    /**
     * Constructor initializes the game with a shuffled deck, game status and empty hands for player and bank.
     */
    public function __construct()
    {
        $this->deck = new DeckOfCards();
        $this->deck->shuffle();
        $this->playerHand = new CardHand();
        $this->bankHand = new CardHand();
        $this->status = 'playing';
    }

    /**
     * Adds a card to the specified hand from the deck.
     *
     * @param CardHand $hand The hand to add cards to.
     */
    private function addCardToHand(CardHand $hand): void
    {
        $card = $this->deck->dealCard();
        if ($card !== null) {
            $hand->addCard($card);
        }
    }

    /**
     * Allows the player to take a hit (draw a card) during their turn.
     * Updates the game status if the players score exceeds 21.
     */
    public function hit(): void
    {
        $this->addCardToHand($this->playerHand);
        if ($this->calcScore($this->playerHand->getCards()) > 21) {
            $this->status = 'Player loss';
        }
    }

    /**
     * Handles the players decision to stand, ends their turn and initiates the banks play.
     */
    public function stand(): void
    {
        $this->bankPlay();
    }

    /**
     * Manages the banks turn, where the bank continues to draw cards until its score is 16 or more.
     */
    private function bankPlay(): void
    {
        while ($this->calcScore($this->bankHand->getCards()) < 16) {
            $this->addCardToHand($this->bankHand);
        }
        $this->gameOver();
    }

    /**
     * Calculates the score of a hand.
     *
     * @param array $hand An array of Card objects representing a hand.
     * @return int The total score of the hand.
     */
    private function calcScore(array $hand): int
    {
        $score = 0;
        $aces = 0;

        foreach ($hand as $card) {
            if ($card->getValue() === 'A') {
                $aces++;
            } elseif (in_array($card->getValue(), ['J', 'Q', 'K'])) {
                $score += 10;
            } else {
                $score += intval($card->getValue());
            }
        }

        for ($i = 0; $i < $aces; $i++) {
            $score += ($score + 14 <= 21) ? 14 : 1;
        }

        return $score;
    }

    /**
     * Determines the outcome of the game after the bank finishes its turn.
     */
    public function gameOver(): void
    {
        $playerScore = $this->calcScore($this->playerHand->getCards());
        $bankScore = $this->calcScore($this->bankHand->getCards());

        if ($playerScore > 21) {
            $this->status = 'Player loss';
            return;
        }
        if ($bankScore > 21) {
            $this->status = 'Bank loss';
            return;
        }
        $this->status = ($playerScore > $bankScore) ? 'Player wins' : 'Bank wins';
    }

    /**
     * Gets the current status of the game.
     *
     * @return string The current game status.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Gets the players hand.
     *
     * @return CardHand The players hand.
     */
    public function getPlayerHand(): CardHand
    {
        return $this->playerHand;
    }

    /**
     * Gets the banks hand.
     *
     * @return CardHand The banks hand.
     */
    public function getBankHand(): CardHand
    {
        return $this->bankHand;
    }

    /**
     * Calculates and returns the players score.
     *
     * @return int The score of the players hand.
     */
    public function getPlayerScore(): int
    {
        return $this->calcScore($this->playerHand->getCards());
    }

    /**
     * Calculates and returns the banks score.
     *
     * @return int The score of the banks hand.
     */
    public function getBankScore(): int
    {
        return $this->calcScore($this->bankHand->getCards());
    }

    /**
     * Generates a string representation of the current state of the game, including status and hands scores.
     *
     * @return string A string detailing the games current state.
     */
    public function getAsString(): string
    {
        $playerCards = implode(", ", array_map(function ($card) {
            return $card->getAsString();
        }, $this->playerHand->getCards()));

        $bankCards = implode(", ", array_map(function ($card) {
            return $card->getAsString();
        }, $this->bankHand->getCards()));

        return "Status: {$this->status}\n
                {$this->deck}\n
                Player cards:{$playerCards} Score: {$this->getPlayerScore()}\n
                Bank cards:{$bankCards} Score: {$this->getBankScore()}\n
                ";
    }
}
