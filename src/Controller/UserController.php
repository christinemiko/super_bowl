<?php

namespace App\Controller;
use App\Entity\FootballMatch;
use App\Entity\User;
use App\Repository\SportbetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('homepage.html.twig');
    }

    #[Route('/myaccount', name: 'myaccount')]
    public function myAccount(SportbetRepository $sportbetRepository,SerializerInterface $serializer): Response
    {
        $user = $this->getUser();
        $sportbets = $sportbetRepository->findBy(['user' => $user], ['id' => 'ASC']);

        // Préparez les données pour le graphique
        $wagerMadeData = [];
        $moneyGainData = [];
        $moneyLoseData = [];


        foreach ($sportbets as $sportbet) {

            // Ajoutez les valeurs appropriées à chaque tableau de données
            $wagerMadeData[] = $sportbet->getWagerMade();
            $moneyGainData[] = $sportbet->getMoneyGain();
            $moneyLoseData[] = $sportbet->getMoneyLose();

        }

        return $this->render('myaccount.html.twig',[

            'sportbets'=> $sportbets,
            'wagerMadeData' => json_encode($wagerMadeData), // Convertit les tableaux en chaînes JSON
            'moneyGainData' => json_encode($moneyGainData),
            'moneyLoseData' => json_encode($moneyLoseData),


        ]);
    }

    #[Route('/history', name: 'history')]
    public function History(SportbetRepository $sportbetRepository): Response
    {
        $user = $this->getUser();
        $sportbet = $sportbetRepository->findBy(['user' => $user], ['id' => 'DESC']);

        return $this->render('historysportbet.html.twig',[

              'sportbets'=> $sportbet
            ]);
    }

    #[Route('/information', name: 'information')]
    public function userInformation(): Response
    {
        return $this->render('userinformation.html.twig');
    }

    #[Route('deletemoncompte/{id}', name: 'deletemoncompte', methods: ['GET'])]
    public function delete( EntityManagerInterface $entityManager, User $user) : Response
    {
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute("accueil");
    }
}
