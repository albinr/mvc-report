<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Card.
 */
class DeckOfCardsTest extends TestCase
{
    public function testInitialization()
    {
        $deck = new DeckOfCards();
        $this->assertCount(52, $deck->getCards());

        $cards = $deck->getCards();
        $this->assertEquals('2', $cards[0]->getValue());
        $this->assertEquals('Spades', $cards[51]->getSuit());
    }

    public function testConstructFromArray()
    {
        $cards = [
            ['value' => 'A', 'suit' => 'Hearts', 'id' => 1],
            ['value' => 'K', 'suit' => 'Spades', 'id' => 2],
            ['value' => 'Q', 'suit' => 'Spades', 'id' => 3],
            ['value' => 'J', 'suit' => 'Spades', 'id' => 4],
        ];
        $deck = new DeckOfCards(1, $cards);
        $this->assertCount(4, $deck->getCards());
        $extractedCards = $deck->toArray();
        foreach ($cards as $index => $cardData) {
            $this->assertEquals($cardData['value'], $extractedCards[$index]['value']);
            $this->assertEquals($cardData['suit'], $extractedCards[$index]['suit']);
            $this->assertEquals($cardData['id'], $extractedCards[$index]['id']);
        }
    }


    public function testShuffle()
    {
        $deck = new DeckOfCards();
        $beforeShuffle = $deck->toArray();
        $deck->shuffleDeck();
        $afterShuffle = $deck->toArray();

        $this->assertNotEquals($beforeShuffle, $afterShuffle);
    }

    public function testSort()
    {
        $deck = new DeckOfCards();
        $deck->shuffleDeck();
        $deck->sortDeck();
        $cards = $deck->getCards();
        $this->assertEquals(1, $cards[0]->getId());
        $this->assertEquals(52, $cards[51]->getId());
    }

    public function testDealCard()
    {
        $deck = new DeckOfCards();
        $initialCount = count($deck->getCards());
        $card = $deck->dealCard();

        $this->assertInstanceOf(Card::class, $card);
        $this->assertCount($initialCount - 1, $deck->getCards());
    }

    public function testToArray()
    {
        $deck = new DeckOfCards();
        $array = $deck->toArray();
        $this->assertIsArray($array);
        $this->assertCount(52, $array);
        $this->assertArrayHasKey('value', $array[0]);
    }

    public function testToString()
    {
        $deck = new DeckOfCards();
        $this->assertStringContainsString('52 cards remaining', (string) $deck);
    }
}
