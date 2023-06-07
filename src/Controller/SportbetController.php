<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SportbetController extends AbstractController
{
    #[Route('/sportbet', name: 'app_sportbet')]
    public function index(): Response
    {
        return $this->render('sportbet/index.html.twig', [
            'controller_name' => 'SportbetController',
        ]);
    }
}
