<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Repository\SportbetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin', methods: ['GET'])]
    public function index(SportbetRepository $sportbetRepository): Response
    {
        $user = $this->getUser();
        $sportbet = $sportbetRepository->findBy(['user' => $user], ['id' => 'DESC']);

        return $this->render('myaccount.html.twig',[

            'sportbets'=> $sportbet,

        ]);
    }
}