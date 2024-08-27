<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Player.
 */
class PlayerTest extends TestCase
{
    public function testPlayerInit()
    {
        $player = new Player(1, "Albin", 2);

        $this->assertEquals(1, $player->getId());
        $this->assertEquals("Albin", $player->getName());
        $this->assertCount(2, $player->getHands());
        $this->assertCount(2, $player->getResults());
        $this->assertNull($player->getResult(0));
        $this->assertNull($player->getResult(1));
    }

    public function testAddAndGetHands()
    {
        $player = new Player(1, "Albin");

        $hand1 = new CardHand();
        $hand2 = new CardHand();

        $player->addHand($hand1);
        $player->addHand($hand2);

        $this->assertCount(3, $player->getHands());
        $this->assertSame($hand1, $player->getHand(1));
        $this->assertSame($hand2, $player->getHand(2));
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
        $player = new Player(1, "Albin", 2);

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
        $player = new Player(1, "Albin", 2);

        // Initially, results should be null
        $this->assertNull($player->getResult(0));
        $this->assertNull($player->getResult(1));
    }

    public function testOverwriteResults()
    {
        $player = new Player(1, "Albin", 2);

        $player->setResult(0, "win");
        $player->setResult(0, "loss");

        $this->assertEquals("loss", $player->getResult(0));
    }

    public function testAddHandIncreasesResultsArray()
    {
        $player = new Player(1, "Albin", 1);

        $this->assertCount(1, $player->getResults());

        $hand = new CardHand();
        $player->addHand($hand);

        $this->assertCount(2, $player->getResults());
        $this->assertNull($player->getResult(1));
    }
}
