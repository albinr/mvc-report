<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CardControllerTest extends WebTestCase
{
    public function testCard()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/card');

        $this->assertResponseIsSuccessful();
        $this->assertStringContainsString('<!DOCTYPE html>', $client->getResponse()->getContent());
    }

    public function testDeck()
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck');

        $this->assertResponseIsSuccessful();
    }

    public function testShuffle()
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/shuffle');

        $this->assertResponseIsSuccessful();
    }

    public function testDraw()
    {
        $client = static::createClient();
        $client->request('GET', '/card/deck/draw');

        $this->assertResponseIsSuccessful();
    }

    // public function testMultiDraw()
    // {
    //     $client = static::createClient();
    //     $client->request('GET', '/card/deck/5');

    //     $this->assertResponseIsSuccessful();
    // }
}
