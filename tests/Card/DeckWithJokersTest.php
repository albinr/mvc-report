<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Card.
 */
class DeckWithJokersTest extends TestCase
{
    public function testInitializationWithJokers()
    {
        $deck = new DeckWithJokers();
        $this->assertCount(54, $deck->getCards(), "Deck should initialize with 54 cards including 2 jokers");

        $cards = $deck->getCards();
        $joker1 = $cards[52];  // Assuming jokers are added last
        $joker2 = $cards[53];

        $this->assertEquals('Joker', $joker1->getValue());
        $this->assertEquals('Black', $joker1->getSuit());
        $this->assertEquals(53, $joker1->getId());

        $this->assertEquals('Joker', $joker2->getValue());
        $this->assertEquals('Red', $joker2->getSuit());
        $this->assertEquals(54, $joker2->getId());
    }
}
