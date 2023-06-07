<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FootballMatchController extends AbstractController
{
    #[Route('/football/match', name: 'app_football_match')]
    public function index(): Response
    {
        return $this->render('football_match/index.html.twig', [
            'controller_name' => 'FootballMatchController',
        ]);
    }
}
