<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class TwentyOneControllerTest extends WebTestCase
{
    public function testGame()
    {
        $client = static::createClient();
        $client->request('GET', '/game');

        $this->assertResponseIsSuccessful();
        $this->assertStringContainsString('<!DOCTYPE html>', $client->getResponse()->getContent());
    }

    public function testStart()
    {
        $client = static::createClient();
        $client->request('GET', '/game/start');

        $this->assertResponseIsSuccessful();
    }


    public function testHit()
    {
        $client = static::createClient();
        $client->request('GET', '/game/start');
        $client->request('GET', '/game/hit');

        $this->assertResponseIsSuccessful();
    }

    public function testStand()
    {
        $client = static::createClient();
        $client->request('GET', '/game/start');
        $client->request('GET', '/game/stand');

        $this->assertResponseIsSuccessful();
    }

    public function testDoc()
    {
        $client = static::createClient();
        $client->request('GET', '/game/doc');

        $this->assertResponseIsSuccessful();
    }

    public function testApiGameStatus()
    {
        $client = static::createClient();
        $client->request('GET', '/game/start');
        $client->request('GET', '/api/game');
        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $data = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('game-status', $data);
        $this->assertArrayHasKey('player-score', $data);
        $this->assertArrayHasKey('bank-score', $data);
        $this->assertArrayHasKey('player-cards', $data);
        $this->assertArrayHasKey('bank-cards', $data);
    }
}
