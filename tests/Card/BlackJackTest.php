<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class CardGraphic.
 */
class BlackJackTest extends TestCase
{
    public function testInitializationWithPlayers()
    {
        $players = [
            new Player(1, "Albin"),
            new Player(2, "Viggo")
        ];

        $game = new BlackJack($players);

        $this->assertCount(2, $game->getPlayers());
        $this->assertInstanceOf(CardHand::class, $game->getBankHand());
        $this->assertEquals('playing', $game->getStatus());
    }

    public function testPlayerHit()
    {
        $players = [
            new Player(1, "Albin"),
            new Player(2, "Viggo")
        ];

        $game = new BlackJack($players);
        $game->hit();

        $playerHand = $game->getPlayerHand(0)->getCards();
        $this->assertCount(3, $playerHand);

        $score = $game->getPlayerScore(0);
        if ($score > 21) {
            $this->assertEquals("Player Albin bust", $game->getStatus());
        } else {
            $this->assertEquals("playing", $game->getStatus());
        }
    }

    public function testPlayerStand()
    {
        $players = [
            new Player(1, "Albin"),
            new Player(2, "Viggo")
        ];

        $game = new BlackJack($players);
        $game->stand();

        $this->assertEquals(1, $game->getCurrentPlayer());
    }

    public function testAllPlayersStandBankPlays()
    {
        $players = [
            new Player(1, "Albin"),
            new Player(2, "Viggo")
        ];

        $game = new BlackJack($players);
        $game->stand();
        $game->stand();

        $this->assertEquals('complete', $game->getStatus());
    }

    public function testGameResults()
    {
        $players = [
            new Player(1, "Albin"),
            new Player(2, "VIggo")
        ];

        $game = new BlackJack($players);
        $game->stand();
        $game->stand();

        $results = $game->getGameResults();

        foreach ($results as $result) {
            $this->assertArrayHasKey('id', $result);
            $this->assertArrayHasKey('name', $result);
            $this->assertArrayHasKey('score', $result);
            $this->assertArrayHasKey('status', $result);

            $this->assertContains($result['status'], ['win', 'lose', 'draw']);
        }
    }

    public function testBankPlay()
    {
        $players = [
            new Player(1, "Albin"),
            new Player(2, "Viggo")
        ];

        $game = new BlackJack($players);
        $game->stand();
        $game->stand();

        $bankScore = $game->getBankScore();
        $this->assertGreaterThanOrEqual(17, $bankScore);
        $this->assertEquals('complete', $game->getStatus());
    }
}
