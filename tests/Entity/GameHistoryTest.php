<?php

use PHPUnit\Framework\TestCase;
use App\Entity\GameHistory;

class GameHistoryTest extends TestCase
{
    public function testSetAndGetId()
    {
        $gameHistory = new GameHistory();

        $reflection = new \ReflectionClass($gameHistory);
        $property = $reflection->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($gameHistory, 1);

        $this->assertEquals(1, $gameHistory->getId());
    }

    public function testSetAndGetGameDate()
    {
        $gameHistory = new GameHistory();
        $gameDate = new \DateTime('2024-01-01 12:00:00');

        $gameHistory->setGameDate($gameDate);

        $this->assertEquals($gameDate, $gameHistory->getGameDate());
    }

    public function testSetAndGetPlayerDataJson()
    {
        $gameHistory = new GameHistory();
        $playerData = [
            ['name' => 'Player1', 'score' => 21, 'result' => 'win'],
            ['name' => 'Player2', 'score' => 19, 'result' => 'lose']
        ];

        $gameHistory->setPlayerDataJson($playerData);

        $this->assertEquals($playerData, $gameHistory->getPlayerDataJson());
    }

    public function testSetAndGetBankScore()
    {
        $gameHistory = new GameHistory();
        $bankScore = 17;

        $gameHistory->setBankScore($bankScore);

        $this->assertEquals($bankScore, $gameHistory->getBankScore());
    }
}
