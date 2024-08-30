<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiBlackJackControllerTest extends WebTestCase
{
    public function testApiBlackJackSetup()
    {
        $client = static::createClient();
        
        $client->request("POST", "/proj/api/blackjack/setup");

        $this->assertResponseIsSuccessful();

        $this->assertJson($client->getResponse()->getContent());

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("Game started", $response["status"]);
        $this->assertIsArray($response["players"]);
        $this->assertIsArray($response["bank"]["bank-cards"]);
    }

    public function testApiBlackJackStatusNoGame()
    {
        $client = static::createClient();
        
        $client->request("GET", "/proj/api/blackjack/status");

        $this->assertResponseIsSuccessful();

        $this->assertJson($client->getResponse()->getContent());

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("No game in session.", $response["game-status"]);
    }

    public function testApiBlackJackStatusWithGame()
    {
        $client = static::createClient();
        
        $client->request("POST", "/proj/api/blackjack/setup");

        $client->request("GET", "/proj/api/blackjack/status");

        $this->assertResponseIsSuccessful();

        $this->assertJson($client->getResponse()->getContent());

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("playing", $response["game-status"]);
        $this->assertIsArray($response["players"]);
        $this->assertIsArray($response["bank"]["bank-cards"]);
    }

    public function testApiBlackJackHitWithoutGame()
    {
        $client = static::createClient();
        
        $client->request("GET", "/proj/api/blackjack/hit");

        $this->assertResponseIsSuccessful();

        $this->assertJson($client->getResponse()->getContent());

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("No game in progress.", $response["game-status"]);
    }

    public function testApiBlackJackHitWithGame()
    {
        $client = static::createClient();
        
        $client->request("POST", "/proj/api/blackjack/setup");

        $client->request("GET", "/proj/api/blackjack/hit");

        $this->assertResponseIsSuccessful();

        $this->assertJson($client->getResponse()->getContent());

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey("drawn-card", $response);
    }

    public function testApiBlackJackStandWithoutGame()
    {
        $client = static::createClient();
        
        $client->request("GET", "/proj/api/blackjack/stand");

        $this->assertResponseIsSuccessful();

        $this->assertJson($client->getResponse()->getContent());

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("No game in progress.", $response["game-status"]);
    }

    public function testApiBlackJackStandWithGame()
    {
        $client = static::createClient();
        
        $client->request("POST", "/proj/api/blackjack/setup");

        $client->request("GET", "/proj/api/blackjack/stand");

        $this->assertResponseIsSuccessful();

        $this->assertJson($client->getResponse()->getContent());

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey("current-player", $response);
    }

    public function testApiBlackJackDeckWithoutGame()
    {
        $client = static::createClient();
        
        $client->request("GET", "/proj/api/blackjack/deck");

        $this->assertResponseIsSuccessful();

        $this->assertJson($client->getResponse()->getContent());

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals("No game in progress.", $response["game-status"]);
    }

    public function testApiBlackJackDeckWithGame()
    {
        $client = static::createClient();
        
        $client->request("POST", "/proj/api/blackjack/setup");

        $client->request("GET", "/proj/api/blackjack/deck");

        $this->assertResponseIsSuccessful();

        $this->assertJson($client->getResponse()->getContent());

        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertArrayHasKey("number-of-cards", $response);
        $this->assertIsArray($response["deck"]);
    }
}
