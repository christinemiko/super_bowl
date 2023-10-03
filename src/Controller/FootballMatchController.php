<?php

namespace App\Controller;

use App\Repository\FootballMatchRepository;
use App\Repository\FootballPlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FootballMatchController extends AbstractController
{

    #[Route('allmatcheswatch', name:'visualiserlesmatchs')]
    public function Allmatcheswatch(FootballMatchRepository $footballMatchRepository): Response
    {
        $footballMatch = $footballMatchRepository->findBy(['statut' => 'Actuellement', 'deleted' => false],['hourStart' => 'ASC']);
        $footballMatch2 = $footballMatchRepository->findBy(['statut' => 'Prochainement', 'deleted' => false],['hourStart' => 'ASC']);
        $footballMatch3 = $footballMatchRepository->findBy(['statut' => 'Terminé', 'deleted' => false],['hourStart' => 'ASC'] );

        return $this->render('allmatcheswatch.html.twig',[
            'footballMatches' => $footballMatch,
             'footballMatches2' => $footballMatch2,
            'footballMatches3' => $footballMatch3,
        ]);

    }

    #[Route('/onematchwatch/{id}', name:'visualiserunmatch', methods: ['GET'])]
    public function Onematchwatch(FootballMatchRepository $footballMatchRepository, FootballPlayerRepository $footballPlayerRepository,  int $id): Response
    {
        $footballMatch = $footballMatchRepository->findOneBy(["id" =>$id]);

        $team1 = $footballMatch->getTeam1();
        $team2 = $footballMatch->getTeam2();

        $footballPlayers1 = $footballPlayerRepository->findBy(["team" => $team1]);
        $footballPlayers2 = $footballPlayerRepository->findBy(["team" => $team2]);

        return $this->render('onematchwatch.html.twig', [

            'footballMatch' => $footballMatch,
            'footballPlayers1' => $footballPlayers1,
            'footballPlayers2' => $footballPlayers2,
        ]);

    }

}
