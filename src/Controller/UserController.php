<?php

namespace App\Controller;
use App\Entity\User;
use App\Repository\SportbetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('homepage.html.twig');
    }

    #[Route('/myaccount', name: 'myaccount')]
    public function myAccount(SportbetRepository $sportbetRepository): Response
    {
        $user = $this->getUser();
        $sportbet = $sportbetRepository->findBy(['user' => $user], ['id' => 'DESC']);


        return $this->render('myaccount.html.twig',[

            'sportbets'=> $sportbet,

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
