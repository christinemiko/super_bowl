<?php

namespace App\Tests\FunctionnalTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FootballMatchTest extends WebTestCase
{

    public function testAllMatchesWatch(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/allmatcheswatch');

        $this->assertResponseIsSuccessful();

    }

    public function testOneMatchWatch(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/onematchwatch/44');

        $this->assertResponseIsSuccessful();

    }
}
