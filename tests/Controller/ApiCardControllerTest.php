<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiCardControllerTest extends WebTestCase
{
    public function testApiDeck()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/deck');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('deck', $response);
        $this->assertNotEmpty($response['deck']);
    }

    public function testApiDeckShuffle()
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/shuffle');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('deck', $response);
        $this->assertNotEmpty($response['deck']);
    }

    public function testApiDraw()
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/draw');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('card', $response);
        $this->assertArrayHasKey('remaining', $response);
    }

    public function testApiMultiDraw()
    {
        $client = static::createClient();
        $client->request('POST', '/api/deck/draw/5');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('cards', $response);
        $this->assertCount(5, $response['cards']);
        $this->assertArrayHasKey('remaining', $response);
    }
}
