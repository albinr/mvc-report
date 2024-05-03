<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class TwentyOne.
 */
class TwentyOneTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties, use no arguments.
     */
    public function testCreateTwentyOne()
    {
        $game = new TwentyOne();
        $this->assertInstanceOf("\App\Card\TwentyOne", $game);

        $res = $game->getAsString();
        $this->assertNotEmpty($res);
    }

    /**
     * Test that the initial game setup is correct.
     */
    public function testInitialGameState()
    {
        $game = new TwentyOne();
        $this->assertSame('playing', $game->getStatus());
        $this->assertCount(0, $game->getPlayerHand()->getCards());
        $this->assertCount(0, $game->getBankHand()->getCards());
    }

    /**
     * Test hitting adds a card to player hand.
     */
    public function testHit()
    {
        $game = new TwentyOne();
        $game->hit();
        $this->assertCount(1, $game->getPlayerHand()->getCards());
    }

    /**
     * Test standing trigger bank play.
     */
    public function testStand()
    {
        $game = new TwentyOne();
        $game->hit();
        $game->stand();
        $this->assertGreaterThanOrEqual(1, $game->getBankHand()->getCards());
    }

    /**
     * Test player loss.
     */
    public function testPlayerHitLoss()
    {
        $game = new TwentyOne();
        while ($game->getPlayerScore() <= 21) {
            $game->hit();
        }
        $this->assertSame('Player loss', $game->getStatus());
    }

    /**
     * Test player loss.
     */
    public function testGameOver()
    {
        $game = new TwentyOne();
        while ($game->getPlayerScore() <= 21) {
            $game->hit();
        }
        $this->assertSame('Player loss', $game->getStatus());
    }

    public function testPlayerWins()
    {
        $game = new TwentyOne();
        $game->getPlayerHand()->addCard(new Card('K', 'Spades', 13));
        $game->getPlayerHand()->addCard(new Card('Q', 'Spades', 12));

        $game->getBankHand()->addCard(new Card('9', 'Diamonds', 9));
        $game->getBankHand()->addCard(new Card('7', 'Clubs', 7));

        $game->gameOver();

        $this->assertSame('Player wins', $game->getStatus());
    }

    public function testBankWins()
    {
        $game = new TwentyOne();
        $game->getBankHand()->addCard(new Card('K', 'Spades', 13));
        $game->getBankHand()->addCard(new Card('Q', 'Spades', 12));

        $game->getPlayerHand()->addCard(new Card('9', 'Diamonds', 9));
        $game->getPlayerHand()->addCard(new Card('7', 'Clubs', 7));

        $game->gameOver();

        $this->assertSame('Bank wins', $game->getStatus());
    }

    public function testPlayerLoss()
    {
        $game = new TwentyOne();
        $game->getPlayerHand()->addCard(new Card('K', 'Spades', 13));
        $game->getPlayerHand()->addCard(new Card('Q', 'Spades', 12));
        $game->getPlayerHand()->addCard(new Card('Q', 'Spades', 12));

        $game->getBankHand()->addCard(new Card('9', 'Diamonds', 9));
        $game->getBankHand()->addCard(new Card('7', 'Clubs', 7));

        $game->gameOver();

        $this->assertSame('Player loss', $game->getStatus());
    }

    public function testBankLoss()
    {
        $game = new TwentyOne();
        $game->getBankHand()->addCard(new Card('K', 'Spades', 13));
        $game->getBankHand()->addCard(new Card('Q', 'Spades', 12));
        $game->getBankHand()->addCard(new Card('Q', 'Spades', 12));


        $game->getPlayerHand()->addCard(new Card('9', 'Diamonds', 9));
        $game->getPlayerHand()->addCard(new Card('7', 'Clubs', 7));

        $game->gameOver();

        $this->assertSame('Bank loss', $game->getStatus());
    }

}
