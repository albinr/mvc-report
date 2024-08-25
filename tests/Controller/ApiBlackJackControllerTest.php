<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiBlackJackControllerTest extends WebTestCase
{
    public function testApiGameSetup()
    {
        $client = static::createClient();

        $client->request("POST", "/api/blackjack/setup");

        $this->assertResponseIsSuccessful();

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("Game started", $response["status"]);
        $this->assertArrayHasKey("players", $response);
        $this->assertNotEmpty($response["players"]);
    }

    public function testApiGameStatusNoGameInSession()
    {
        $client = static::createClient();

        $client->request("GET", "/proj/api/blackjack");

        $this->assertResponseIsSuccessful();

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("No game in session.", $response["game-status"]);
    }

    public function testApiGameHitNoGameInSession()
    {
        $client = static::createClient();

        $client->request("GET", "/proj/api/blackjack/hit");

        $this->assertResponseIsSuccessful();

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("No game in progress.", $response["game-status"]);
    }

    public function testApiGameStandNoGameInSession()
    {
        $client = static::createClient();

        $client->request("GET", "/proj/api/blackjack/stand");

        $this->assertResponseIsSuccessful();

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("No game in progress.", $response["game-status"]);
    }

    public function testApiGameDeckNoGameInSession()
    {
        $client = static::createClient();

        $client->request("GET", "/proj/api/blackjack/deck");

        $this->assertResponseIsSuccessful();

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("No game in progress.", $response["game-status"]);
    }
}
