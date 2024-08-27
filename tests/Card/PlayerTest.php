<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Player.
 */
class PlayerTest extends TestCase
{
    public function testPlayerInitialization()
    {
        $player = new Player(1, "Albin");

        $this->assertEquals(1, $player->getId());
        $this->assertEquals("Albin", $player->getName());
        $this->assertEmpty($player->getHands());
        $this->assertEmpty($player->getResults());
    }

    public function testAddAndGetHands()
    {
        $player = new Player(1, "Albin");
        $hand1 = new CardHand();
        $hand2 = new CardHand();

        $player->addHand($hand1);
        $player->addHand($hand2);

        $this->assertCount(2, $player->getHands());
        $this->assertSame($hand1, $player->getHand(0));
        $this->assertSame($hand2, $player->getHand(1));
    }

    public function testSetAndGetHand()
    {
        $player = new Player(1, "Albin");
        $hand1 = new CardHand();
        $hand2 = new CardHand();

        $player->setHand(0, $hand1);
        $player->setHand(1, $hand2);

        $this->assertSame($hand1, $player->getHand(0));
        $this->assertSame($hand2, $player->getHand(1));
    }

    public function testSetAndGetResults()
    {
        $player = new Player(1, "Albin");

        $player->setResult(0, "win");
        $player->setResult(1, "loss");

        $this->assertEquals("win", $player->getResult(0));
        $this->assertEquals("loss", $player->getResult(1));

        $results = $player->getResults();
        $this->assertCount(2, $results);
        $this->assertEquals("win", $results[0]);
        $this->assertEquals("loss", $results[1]);
    }

    public function testGetResultReturnsNullIfNoResult()
    {
        $player = new Player(1, "Albin");

        $this->assertNull($player->getResult(0));
    }

    public function testOverwriteResults()
    {
        $player = new Player(1, "Albin");

        $player->setResult(0, "win");

        $player->setResult(0, "loss");

        $this->assertEquals("loss", $player->getResult(0));
    }
}
