<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Player;

class PlayerTest extends TestCase
{
    public function testSetAndGetPlayerId()
    {
        $player = new Player();

        $reflection = new \ReflectionClass($player);
        $property = $reflection->getProperty("playerid");
        $property->setAccessible(true);
        $property->setValue($player, 1);

        $this->assertEquals(1, $player->getPlayerId());
    }

    public function testSetAndGetName()
    {
        $player = new Player();
        $playerName = 'Albin';

        $player->setName($playerName);

        $this->assertEquals($playerName, $player->getName());
    }

    public function testSetAndGetWins()
    {
        $player = new Player();
        $wins = 5;

        $player->setWins($wins);

        $this->assertEquals($wins, $player->getWins());
    }

    public function testSetAndGetLosses()
    {
        $player = new Player();
        $losses = 3;

        $player->setLosses($losses);

        $this->assertEquals($losses, $player->getLosses());
    }

    public function testPlayerDefaultValues()
    {
        $player = new Player();

        $this->assertEquals(0, $player->getWins());
        $this->assertEquals(0, $player->getLosses());
        $this->assertNull($player->getName());
    }
}
