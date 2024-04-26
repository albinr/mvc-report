<?php

namespace App\TwentyOne;

use App\Card\DeckOfCards;
use App\Card\CardHand;

class TwentyOne
{
    private DeckOfCards $deck;
    private CardHand $playerHand;
    private CardHand $bankHand;
    private string $status;

    public function __construct()
    {
        $this->deck = new DeckOfCards();
        $this->deck->shuffle();
        $this->playerHand = new CardHand();
        $this->bankHand = new CardHand();
        $this->status = 'playing';
    }

    public function hit(): void
    {
        $card = $this->deck->dealCard();
        if ($card !== null) {
            $this->playerHand->addCard($card);
            if ($this->calcScore($this->playerHand->getCards()) > 21) {
                $this->status = 'Player loss';
            }
        }
    }

    public function stand(): void
    {
        $this->bankPlay();
    }

    private function bankPlay(): void
    {
        while ($this->calcScore($this->bankHand->getCards()) < 16) {
            $this->bankHand->addCard($this->deck->dealCard());
        }
        $this->gameOver();
    }

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

    private function gameOver(): void
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

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getPlayerHand(): CardHand
    {
        return $this->playerHand;
    }

    public function getBankHand(): CardHand
    {
        return $this->bankHand;
    }

    public function getPlayerScore(): int
    {
        return $this->calcScore($this->playerHand->getCards());
    }

    public function getBankScore(): int
    {
        return $this->calcScore($this->bankHand->getCards());
    }
}
