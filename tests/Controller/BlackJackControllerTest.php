<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlackJackControllerTest extends WebTestCase
{
    public function testHome()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/proj/blackjack');

        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('h1', 'Black Jack');
        $this->assertSelectorExists('.player-select');
    }

    public function testStartGame()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => [1, 3],  // Currently valid ids (id:2 was deleted)
            'hands' => [1 => 1, 3 => 1]
        ]);

        $client->followRedirect();

        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('.game-status', 'playing');
    }

    public function testHitRoute()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => [1, 3],
            'hands' => [1 => 1, 3 => 1]
        ]);

        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();

        $client->request('GET', '/proj/blackjack/hit');

        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('.black-jack');
        $this->assertSelectorExists('.hand');
    }


    public function testStand()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => [1],
            'hands' => [1 => 1]
        ]);

        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();

        $client->request('GET', '/proj/blackjack/stand');

        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();

        $this->assertSelectorTextContains('.game-status', 'complete');
    }


    public function testCreatePlayerForm()
    {
        $client = static::createClient();

        $client->request('GET', '/proj/blackjack/create_player_form');

        $this->assertResponseIsSuccessful();

        $this->assertSelectorExists('form input[name="name"]');
        $this->assertSelectorExists('form input[type="submit"]');
    }


    public function testPlayerNotSelected()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => []
        ]);

        $client->followRedirect();

        $this->assertSelectorExists('.flash-warning');
        $this->assertSelectorTextContains('.flash-warning', 'No players were selected');
    }
}
