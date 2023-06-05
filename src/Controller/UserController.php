<?php

namespace App\Controller;
use App\Entity\User;
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
    public function myAccount(): Response
    {
        return $this->render('myaccount.html.twig');
    }

    #[Route('/history', name: 'history')]
    public function History(): Response
    {
        return $this->render('historysportbet.html.twig');
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
