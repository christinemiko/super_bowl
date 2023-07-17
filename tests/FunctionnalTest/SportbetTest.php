<?php

namespace App\Tests\FunctionnalTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SportbetTest extends WebTestCase
{
    public function testBetMatch(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/betmatch/26');

        $this->assertResponseIsSuccessful();
    }

    public function testEditMatch(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/editbetmatch/26');

        $this->assertResponseIsSuccessful();
    }

    public function testDeleteMatch(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/deletebetmatch/26');

        $this->assertResponseIsSuccessful();
    }

    public function testBetallmatches(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/betallmatches');

        $this->assertResponseIsSuccessful();
    }
}
