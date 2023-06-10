<?php

namespace App\Controller;

use App\Entity\FootballMatch;
use App\Repository\FootballMatchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class FootballMatchController extends AbstractController
{
    #[Route('/football/match', name: 'app_football_match')]
    public function index(): Response
    {
        return $this->render('football_match/index.html.twig', [
            'controller_name' => 'FootballMatchController',
        ]);
    }

    #[Route('allmatcheswatch', name:'visualiserlesmatchs')]
    public function Allmatcheswatch(FootballMatchRepository $footballMatchRepository): Response
    {
        $footballMatch = $footballMatchRepository->findBy(['statut' => 'En cours']);
        $footballMatch2 = $footballMatchRepository->findBy(['statut' => 'Prochainement']);
        $footballMatch3 = $footballMatchRepository->findBy(['statut' => 'Terminé']);

        return $this->render('allmatcheswatch.html.twig',[
            'footballMatches' => $footballMatch,
             'footballMatches2' => $footballMatch2,
            'footballMatches3' => $footballMatch3,
        ]);

    }

    #[Route('/onematchwatch/{id}', name:'visualiserunmatch', methods: ['GET'])]
    public function Onematchwatch(FootballMatchRepository $footballMatchRepository, int $id): Response
    {
        $footballMatch = $footballMatchRepository->findOneBy(["id" =>$id]);

        return $this->render('onematchwatch.html.twig', [

            'footballMatch' => $footballMatch,
        ]);

    }

    #[Route('betmatch', name:'miser')]
    public function BetMatch(): Response
    {

        return $this->render('betmatch.html.twig');

    }

    #[Route('betallmatches', name:'parier')]
    public function BetAllMatches(): Response
    {

        return $this->render('betallmatches.html.twig');

    }
}
