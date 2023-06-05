<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{

    #[Route('/', 'accueil')]
    public function Accueil(): Response
    {

        return $this->render('homepage.html.twig');

    }

    #[Route('allmatcheswatch', name:'visualiserlesmatchs')]
    public function Allmatcheswatch(): Response
    {

        return $this->render('allmatcheswatch.html.twig');

    }

    #[Route('onematchwatch', name:'visualiserunmatch')]
    public function Onematchwatch(): Response
    {

        return $this->render('onematchwatch.html.twig');

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
    #[Route('inscription', name:'inscription')]
    public function Inscription(): Response
    {

        return $this->render('register.html.twig');

    }
}