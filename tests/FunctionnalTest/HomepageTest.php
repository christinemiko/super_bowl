<?php

namespace App\Tests\FunctionnalTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageTest extends WebTestCase
{
    public function testAccueil(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();

    }

    public function testInscription(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $client->request('GET', '/inscription');

        $this->assertResponseIsSuccessful();

    }

}
