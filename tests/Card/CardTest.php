<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Card.
 */
class CardTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateCard()
    {
        $card = new Card('A', 'Spades', 1);
        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals('A', $card->getValue());
        $this->assertEquals('Spades', $card->getSuit());
        $this->assertEquals(1, $card->getId());
    }
    /**
     * Test the string function of a Card object.
     */
    public function testGetAsString()
    {
        $card = new Card('Q', 'Diamonds', 12);
        $this->assertEquals('Q of Diamonds', $card->getAsString());
    }

    /**
     * Test the string function of a Card object.
     */
    public function testGetValue()
    {
        $card = new Card('K', 'Spades', 2);
        $this->assertEquals('K', $card->getValue());
    }

    /**
     * Test the string function of a Card object.
     */
    public function testGetSuit()
    {
        $card = new Card('Q', 'Diamonds', 12);
        $this->assertEquals('Diamonds', $card->getSuit());
    }

    /**
     * Test the string function of a Card object.
     */
    public function testGetId()
    {
        $card = new Card('3', 'Clubs', 13);
        $this->assertEquals(13, $card->getId());
    }

}
