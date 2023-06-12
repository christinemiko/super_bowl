<?php

namespace App\Controller;

use App\Entity\FootballMatch;
use App\Entity\Sportbet;
use App\Form\BetMatchFormType;
use App\Form\ReservationFormType;
use App\Repository\FootballMatchRepository;
use App\Repository\FootballPlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;


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

    #[Route('betmatch/{id}', name:'miser', methods:['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function BetMatch(Request $request ,EntityManagerInterface $entityManager, FootballMatchRepository $footballMatchRepository, int $id): Response
    {
        $footballMatch = $footballMatchRepository->findOneBy(["id" =>$id]);

        $sportbet = new Sportbet();

        /* SET USER START*/
        $user = $this->getUser();
        $sportbet->setUser($this->getUser($user));
        /* SET USER END*/

        /* SET FOOTBALL MATCH START*/
        $sportbet->setFootballMatch($footballMatch);
        /* SET FOOTBALL MATCH END*/

        /* SET DATE START*/
        $currentDate = new \DateTime();
        $sportbet->setDatewagerMade($currentDate);
        /* SET DATE END*/

        $form = $this->createForm(BetMatchFormType::class, $sportbet);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $sportbet = $form->getData();
            $entityManager->persist($sportbet);
            $entityManager->flush();
            return $this->redirectToRoute('parier');
        }


        return $this->render('betmatch.html.twig', [

            'form' => $form->createView(),
            'footballMatch' => $footballMatch,
        ]);

    }

    #[Route('betallmatches', name:'parier')]
    #[IsGranted('ROLE_USER')]
    public function BetAllMatches(FootballMatchRepository $footballMatchRepository): Response
    {
        $footballMatch = $footballMatchRepository->findBy(['statut' => 'Prochainement']);

        return $this->render('betallmatches.html.twig', [

            'footballMatches' => $footballMatch,
        ]);

    }
}
