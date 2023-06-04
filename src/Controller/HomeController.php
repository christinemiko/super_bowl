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

    #[Route('allmatcheswatch', name:'allmatcheswatch')]
    public function Allmatcheswatch(): Response
    {

        return $this->render('allmatcheswatch.html.twig');

    }

    #[Route('onematchwatch', name:'onematchwatch')]
    public function Onematchwatch(): Response
    {

        return $this->render('onematchwatch.html.twig');

    }
}