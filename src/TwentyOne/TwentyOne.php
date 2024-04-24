<?php

namespace App\Game;

use App\Card\DeckOfCards;
use App\Card\CardHand;

class TwentyOne
{
    private $deck;
    private $playerHand;
    private $dealerHand;
    private $status;

    public function __construct()
    {
        $this->deck = new DeckOfCards();
        $this->deck->shuffle();
        $this->playerHand = new CardHand();
        $this->dealerHand = new CardHand();
        $this->status = 'playing';
    }

    public function hit()
    {
        $this->playerHand->addCard($this->deck->dealCard());
        if ($this->calculateScore($this->playerHand->getCards()) > 21) {
            $this->status = 'bust';
        }
    }

    public function stand()
    {
        $this->dealerPlay();
    }

    private function dealerPlay()
    {
        while ($this->calculateScore($this->dealerHand->getCards()) < 17) {
            $this->dealerHand->addCard($this->deck->dealCard());
        }
        $this->finalizeGame();
    }

    private function calculateScore(array $hand): int
    {
        $score = 0;
        foreach ($hand as $card) {
            if ($card->getValue() === 'A') {
                $score += ($score + 14 <= 21) ? 14 : 1;
            } else if (in_array($card->getValue(), ['J', 'Q', 'K', '10'])) {
                $score += 10;
            } else {
                $score += (int) $card->getValue();
            }
        }
        return $score;
    }

    private function finalizeGame()
    {
        $playerScore = $this->calculateScore($this->playerHand->getCards());
        $dealerScore = $this->calculateScore($this->dealerHand->getCards());

        if ($playerScore > 21) {
            $this->status = 'Player busts';
        } else if ($dealerScore > 21) {
            $this->status = 'Dealer busts';
        } else if ($playerScore >= $dealerScore) {
            $this->status = 'Player wins';
        } else {
            $this->status = 'Dealer wins';
        }
    }

}
