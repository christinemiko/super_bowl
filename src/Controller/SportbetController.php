<?php

namespace App\Controller;

use App\Entity\Sportbet;
use App\Form\BetMatchFormType;
use App\Repository\FootballMatchRepository;
use App\Repository\SportbetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class SportbetController extends AbstractController
{

    #[Route('betmatch/{id}', name:'miser', methods:['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function newBetMatch(Request $request ,EntityManagerInterface $entityManager, FootballMatchRepository $footballMatchRepository, int $id,  UserInterface $user): Response
    {
        $footballMatch = $footballMatchRepository->findOneBy(["id" => $id]);

        $existingSportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $user]);

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

        if ($existingSportbet) {

            return $this->render('user/editbetmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => true,
            ]);
        } else {

            /* Si aucun Sportbet n'existe, afficher le bouton "Validation"*/
            return $this->render('betmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => false,
            ]);
        }
    }

    #[Route('editbetmatch', name: 'Actualiser', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function editBetMatch( Request $request, EntityManagerInterface $entityManager, SportbetRepository $sportbetRepository, int $id, FootballMatchRepository $footballMatchRepository):Response
    {
        $footballMatch = $footballMatchRepository->findOneBy(["id" => $id]);

        $existingSportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $user]);

        $form = $this->createForm(BetMatchFormType::class, $sportbet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sportbet);
            $entityManager->flush();
            return $this->redirectToRoute('parier');
        }

        return $this->render('editbetmatch.html.twig', [

            'form' => $form->createView(),
            'footballMatch' => $footballMatch,
            'existingSportbet' => true,
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
