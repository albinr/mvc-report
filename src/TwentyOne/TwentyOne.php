<?php

namespace App\Game;

use App\Card\DeckOfCards;
use App\Card\CardHand;
use App\Card\CardGraphic;

class TwentyOne
{
    private $deck;
    private $playerHand;
    private $bankHand;
    private $status;

    public function __construct()
    {
        $this->deck = new DeckOfCards();
        $this->deck->shuffle();
        $this->playerHand = new CardHand();
        $this->bankHand = new CardHand();
        $this->status = 'playing';
    }

    public function hit()
    {
        $this->playerHand->addCard($this->deck->dealCard());
        if ($this->calcScore($this->playerHand->getCards()) > 21) {
            $this->status = 'bust';
        }
    }

    public function stand()
    {
        $this->dealerPlay();
    }

    private function dealerPlay()
    {
        while ($this->calcScore($this->bankHand->getCards()) < 17) {
            $this->bankHand->addCard($this->deck->dealCard());
        }
        $this->finalizeGame();
    }

    private function calcScore(array $hand): int
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
        $playerScore = $this->calcScore($this->playerHand->getCards());
        $dealerScore = $this->calcScore($this->bankHand->getCards());

        if ($playerScore > 21) {
            $this->status = 'Player loss';
        } else if ($dealerScore > 21) {
            $this->status = 'Dealer loss';
        } else if ($playerScore >= $dealerScore) {
            $this->status = 'Player wins';
        } else {
            $this->status = 'Dealer wins';
        }
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPlayerHand()
    {
        return $this->playerHand;
    }

    public function getBankHand()
    {
        return $this->bankHand;
    }

    public function getPlayerScore()
    {
        return $this->calcScore($this->playerHand->getCards());
    }

    public function getBankScore()
    {
        return $this->calcScore($this->bankHand->getCards());
    }
}
