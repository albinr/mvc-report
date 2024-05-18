<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReportControllerTest extends WebTestCase
{
    public function testHome()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertStringContainsString('<!DOCTYPE html>', $client->getResponse()->getContent());
    }

    public function testAbout()
    {
        $client = static::createClient();
        $client->request('GET', '/about');

        $this->assertResponseIsSuccessful();
    }


    public function testReport()
    {
        $client = static::createClient();
        $client->request('GET', '/report');

        $this->assertResponseIsSuccessful();
    }

    public function testLucky()
    {
        $client = static::createClient();
        $client->request('GET', '/lucky');

        $this->assertResponseIsSuccessful();
    }

    public function testMetrics()
    {
        $client = static::createClient();
        $client->request('GET', '/metrics');

        $this->assertResponseIsSuccessful();
    }

    public function testSession()
    {
        $client = static::createClient();
        $client->request('GET', '/session');

        $this->assertResponseIsSuccessful();
    }

    public function testSessionDelete()
    {
        $client = static::createClient();

        $client->request('GET', '/session');
        $session = $client->getRequest()->getSession();
        $session->set('test_key', 'test_value');
        $session->save();

        $this->assertEquals('test_value', $session->get('test_key'));

        $client->request('GET', '/session/delete');

        $this->assertTrue($client->getResponse()->isRedirect('/session'));

        $client->followRedirect();

        $newSession = $client->getRequest()->getSession();

        $this->assertEmpty($newSession->all());
    }
}
