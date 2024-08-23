<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardGraphic.
 */
class PlayerTest extends TestCase
{
    public function testPlayerInit()
    {
        $player = new Player(1, "Albin");

        $this->assertEquals(1, $player->getId());
        $this->assertEquals("Albin", $player->getName());
        $this->assertInstanceOf(CardHand::class, $player->getHand());
        $this->assertEquals("", $player->getResult());
    }

    public function testSetAndGetHand()
    {
        $player = new Player(1, "Albin");
        $hand = new CardHand();

        $player->setHand($hand);

        $this->assertSame($hand, $player->getHand());
    }

    public function testSetWin()
    {
        $player = new Player(1, "Albin");

        $player->setWin();
        $this->assertEquals("win", $player->getResult());
    }

    public function testSetLoss()
    {
        $player = new Player(1, "Albin");

        $player->setLoss();
        $this->assertEquals("loss", $player->getResult());
    }

    public function testSetDraw()
    {
        $player = new Player(1, "Albin");

        $player->setDraw();
        $this->assertEquals("draw", $player->getResult());
    }
}
