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
    public function newBetMatch(Request $request ,EntityManagerInterface $entityManager, FootballMatchRepository $footballMatchRepository, int $id,UserInterface $user): Response
    {
        $footballMatch = $footballMatchRepository->findOneBy(["id" => $id]);
        $existingSportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $user]);

        if (!$existingSportbet) {
            $sportbet = new Sportbet();
            $sportbet->setUser($user);
            $sportbet->setFootballMatch($footballMatch);
            $currentDate = new \DateTime();
            $sportbet->setDatewagerMade($currentDate);
            $existingSportbet = $sportbet;
        }
        $form = $this->createForm(BetMatchFormType::class, $existingSportbet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sportbet = $form->getData();
            $entityManager->persist($sportbet);
            $entityManager->flush();
            return $this->redirectToRoute('parier');
        }

        if ($existingSportbet) {

            /* Si  Sportbet existe, afficher le bouton "Actualisation" et envoit la page Actualisation Pari */
            return $this->render('user/editbetmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => true,
            ]);
        } else {

            /* Si aucun Sportbet n'existe, afficher le bouton "Validation" et envoit la page Parier */
            return $this->render('betmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => false,
            ]);
        }
    }

    #[Route('editbetmatch/{id}/{userId}', name: 'actualiser', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function editBetMatch( Request $request, EntityManagerInterface $entityManager, SportbetRepository $sportbetRepository, int $id, FootballMatchRepository $footballMatchRepository,int $userId):Response
    {
        $footballMatch = $footballMatchRepository->findOneBy(["id" => $id]);

        $sportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $userId]);

        $form = $this->createForm(BetMatchFormType::class, $sportbet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sportbet);
            $entityManager->flush();
            return $this->redirectToRoute('parier');
        }

            return $this->render('user/editbetmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => true,
            ]);
    }

    #[Route('deletebetmatch/{id}/{userId}', name: 'supprimer')]
    #[IsGranted('ROLE_USER')]
    public function DeleteBetMatch(Request $request, EntityManagerInterface $entityManager, SportbetRepository $sportbetRepository, int $id, FootballMatchRepository $footballMatchRepository,int $userId): Response
    {
        $footballMatch = $footballMatchRepository->findOneBy(["id" => $id]);
        $sportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $userId]);
        $entityManager->remove($sportbet);
        $entityManager->flush();
        return $this->redirectToRoute("parier");
    }


    #[Route('betallmatches', name:'parier', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function BetAllMatches(FootballMatchRepository $footballMatchRepository,): Response
    {
        $footballMatch = $footballMatchRepository->findBy(['statut' => 'Prochainement']);

        return $this->render('betallmatches.html.twig', [

            'footballMatches' => $footballMatch,
        ]);

    }
}
