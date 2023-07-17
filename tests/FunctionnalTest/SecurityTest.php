<?php

namespace App\Tests\FunctionnalTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    public function testLoginPage(): void
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Se Connecter')->form();
        $crawler = $client->submit($form,[
            'email'=> 'christinechau@gmail.com',
            'password' => 'juillet',
        ]);

        $client->request('GET', '/admin');
        $this->assertResponseIsSuccessful();

    }
}
