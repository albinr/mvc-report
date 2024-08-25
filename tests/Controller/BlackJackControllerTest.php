<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class BlackJackControllerTest extends WebTestCase
{
    public function testHome()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/proj/blackjack');

        $this->assertResponseIsSuccessful();
    }

    public function testStartGame()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => [1, 3] #spelare med id 2 existerar inte nu (08-25)
        ]);

        $this->assertSelectorTextContains('.game-status', 'playing');

        $this->assertResponseIsSuccessful();

    }

    public function testHitRoute()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => [1, 2]
        ]);

        $client->request('GET', '/proj/blackjack/hit');

        $this->assertResponseIsSuccessful();

        $this->assertSelectorExists('.black-jack');
    }

    public function testStand()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => [1, 2]
        ]);

        $client->request('GET', '/proj/blackjack/stand');

        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('.game-status', 'complete');
    }

    public function testCreatePlayerForm()
    {
        $client = static::createClient();

        $client->request('GET', '/proj/blackjack/create_player_form');

        $this->assertResponseIsSuccessful();

    }

}
