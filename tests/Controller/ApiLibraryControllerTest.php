<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ApiLibraryControllerTest extends WebTestCase
{
    // public function testApiLibraryReturnsAllBooks()
    // {
    //     $client = static::createClient();
    //     $client->request('GET', '/api/library/books');

    //     $this->assertResponseIsSuccessful();
    //     $response = json_decode($client->getResponse()->getContent(), true);
    //     $this->assertIsArray($response['books']);
    //     $this->assertNotEmpty($response['books']);
    // }

    public function testApiBookIsbnFound()
    {
        $client = static::createClient();
        $client->request('GET', '/api/library/book/9780340960196');

        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('9780340960196', $response['isbn']);
    }

    public function testApiBookIsbnNotFound()
    {
        $client = static::createClient();
        $client->request('GET', '/api/library/book/bad_isbn');

        $this->assertResponseStatusCodeSame(Response::HTTP_NOT_FOUND);
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals('Book not found', $response['error']);
    }
}
