<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testApi()
    {
        $client = static::createClient();
        $client->request('GET', '/api');

        $this->assertResponseIsSuccessful();
        $this->assertStringContainsString('<!DOCTYPE html>', $client->getResponse()->getContent());
    }


    public function testApiQuote()
    {
        $client = static::createClient();
        $client->request('GET', '/api/quote');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $data = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('quote', $data);
        $this->assertArrayHasKey('date', $data);
        $this->assertArrayHasKey('timestamp', $data);
        $expectedQuotes = [
            "Life is what happens when you're busy making other plans. - John Lennon",
            "The greatest glory in living lies not in never falling, but in rising every time we fall. - Nelson Mandela",
            "The way to get started is to quit talking and begin doing.  - Disney",
            "Only a life lived for others is a life worthwhile.  - Albert Einstein",
        ];
        $this->assertContains($data['quote'], $expectedQuotes);
    }
}
