<?php

namespace App\Game;

use App\Card\DeckOfCards;
use App\Card\CardHand;

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
            $this->status = 'Player loss';
        }
    }

    public function stand()
    {
        $this->bankPlay();
    }

    private function bankPlay()
    {
        while ($this->calcScore($this->bankHand->getCards()) < 17) {
            $this->bankHand->addCard($this->deck->dealCard());
        }
        $this->gameOver();
    }

    private function calcScore($hand): int
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
            if ($score + 14 <= 21) {
                $score += 14;
            } else {
                $score += 1;
            }
        }

        return $score;
    }

    private function gameOver()
    {
        $playerScore = $this->calcScore($this->playerHand->getCards());
        $bankScore = $this->calcScore($this->bankHand->getCards());

        if ($playerScore > 21) {
            $this->status = 'Player loss';
        } elseif ($bankScore > 21) {
            $this->status = 'Bank loss';
        } elseif ($playerScore > $bankScore) {
            $this->status = 'Player wins';
        } else {
            $this->status = 'Bank wins';
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
