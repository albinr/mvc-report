<?php

namespace App\Card;

use App\Card\DeckOfCards;
use App\Card\Card;

class DeckWithJokers extends DeckOfCards
{
    protected function initialize(): void
    {
        parent::initialize();
        $this->cards[] = new Card('Joker', 'Black', 53);
        $this->cards[] = new Card('Joker', 'Red', 54);
    }
}
