<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LibraryControllerTest extends WebTestCase
{
    public function testLibrary()
    {
        $client = static::createClient();
        $client->request('GET', '/library');

        $this->assertResponseIsSuccessful();
        $this->assertStringContainsString('<!DOCTYPE html>', $client->getResponse()->getContent());
    }

    public function testCreate()
    {
        $client = static::createClient();
        $client->request('GET', '/library/create');

        $this->assertResponseIsSuccessful();
    }


    public function testReadOne()
    {
        $client = static::createClient();
        $client->request('GET', '/library/book/1');

        $this->assertResponseIsSuccessful();
    }

    public function testReadMany()
    {
        $client = static::createClient();
        $client->request('GET', '/library/books');

        $this->assertResponseIsSuccessful();
    }

    public function testUpdateFormBook()
    {
        $client = static::createClient();
        $client->request('GET', '/library/book/edit/1');

        $this->assertResponseIsSuccessful();
    }


}
