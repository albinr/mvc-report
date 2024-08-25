<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProjControllerTest extends WebTestCase
{
    public function testProjHome()
    {
        $client = static::createClient();
        $crawler = $client->request("GET", "/proj");

        $this->assertResponseIsSuccessful();
    }

    public function testAbout()
    {
        $client = static::createClient();
        $crawler = $client->request("GET", "/proj/about");

        $this->assertResponseIsSuccessful();
    }

    public function testApiBlackJack()
    {
        $client = static::createClient();
        $crawler = $client->request("GET", "/proj/api");

        $this->assertResponseIsSuccessful();
    }
}
