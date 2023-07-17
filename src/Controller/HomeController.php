<?php
namespace App\Controller;

use App\Repository\FootballMatchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{

    #[Route('/', 'accueil')]
    public function Accueil(FootballMatchRepository $footballMatchRepository): Response
    {

        $footballMatch = $footballMatchRepository->findBy(
            ['statut' => 'Actuellement'],
            ['hourStart' => 'ASC']);

        return $this->render('homepage.html.twig', [

            'footballMatches' => $footballMatch
        ]);

    }

    #[Route('inscription', name:'inscription')]
    public function Inscription(): Response
    {
        return $this->render('register.html.twig');
    }
}