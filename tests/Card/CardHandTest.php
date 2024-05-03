<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardHand.
 */
class CardHandTest extends TestCase
{
    public function testConstructorInitialization()
    {
        $hand = new CardHand();
        $this->assertEmpty($hand->getCards());

        $initialCards = [
            ['value' => 'A', 'suit' => 'Hearts', 'id' => 1],
            ['value' => 'K', 'suit' => 'Spades', 'id' => 2]
        ];
        $handWithCards = new CardHand($initialCards);
        $this->assertCount(2, $handWithCards->getCards());
        $this->assertEquals('A', $handWithCards->getCards()[0]->getValue());
    }

    public function testAddCard()
    {
        $hand = new CardHand();
        $card = new Card('Q', 'Diamonds', 12);
        $hand->addCard($card);
        $this->assertCount(1, $hand->getCards());
        $this->assertEquals('Q', $hand->getCards()[0]->getValue());
    }

    public function testShowHand()
    {
        $hand = new CardHand([
            ['value' => '10', 'suit' => 'Clubs', 'id' => 10],
            ['value' => 'J', 'suit' => 'Hearts', 'id' => 11]
        ]);
        $expected = ['10 of Clubs', 'J of Hearts'];
        $this->assertEquals($expected, $hand->showHand());
    }

    public function testClearHand()
    {
        $hand = new CardHand([
            ['value' => '2', 'suit' => 'Spades', 'id' => 2]
        ]);
        $hand->clearHand();
        $this->assertEmpty($hand->getCards());
    }

    public function testToArray()
    {
        $hand = new CardHand([
            ['value' => '3', 'suit' => 'Spades', 'id' => 3]
        ]);
        $expectedArray = [
            ['value' => '3', 'suit' => 'Spades', 'id' => 3]
        ];
        $this->assertEquals($expectedArray, $hand->toArray());
    }

    public function testGetRenderedHand()
    {
        $hand = new CardHand([
            ['value' => '4', 'suit' => 'Diamonds', 'id' => 4]
        ]);
        $renderedHand = $hand->getRenderedHand();
        foreach ($renderedHand as $renderedCard) {
            $this->assertStringContainsString("<div>♦ 4</div>", $renderedCard);
        }
    }
}
