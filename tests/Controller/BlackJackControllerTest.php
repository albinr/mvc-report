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
        $this->assertSelectorExists('.saved-players');
    }

    public function testStartGame()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => [1, 3]  // Currently valid ids (2 was deleted)
        ]);

        $client->followRedirect();

        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('.game-status', 'playing');
    }

    public function testHitRoute()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => [1, 2]
        ]);

        $client->followRedirect();

        $client->request('GET', '/proj/blackjack/hit');
        $this->assertResponseIsSuccessful();

        $this->assertSelectorExists('.black-jack');
        $this->assertSelectorExists('.hand');
    }

    public function testStand()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => [1, 2]
        ]);

        $client->followRedirect();

        $client->request('GET', '/proj/blackjack/stand');

        $client->followRedirect();

        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('.game-status', 'complete');
    }

    public function testCreatePlayerForm()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/proj/blackjack/create_player_form');
        $this->assertResponseIsSuccessful();

        $this->assertSelectorExists('form input[name="name"]');
        $this->assertSelectorTextContains('button', 'Submit');
    }

    public function testPlayerNotSelected()
    {
        $client = static::createClient();

        $client->request('POST', '/proj/blackjack/start', [
            'selectedPlayers' => []
        ]);

        $client->followRedirect();

        $this->assertSelectorExists('.flash-notice');
        $this->assertSelectorTextContains('.flash-notice', 'No players were selected');
    }
}
