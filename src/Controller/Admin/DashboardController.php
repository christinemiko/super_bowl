<?php

namespace App\Controller\Admin;

use App\Entity\FootballMatch;
use App\Entity\FootballPlayer;
use App\Entity\Sportbet;
use App\Entity\Team;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
         $url = $this->adminUrlGenerator->setController(FootballMatchCrudController::class)->generateUrl();
         return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SUPER BOWL');
    }

    public function configureMenuItems(): iterable
    {
        // Ajouter un lien vers la page d'accueil de l'application
        yield MenuItem::linkToUrl('Retour à l\'application', 'fas fa-home', $this->generateUrl('accueil'));


        yield MenuItem::section('Administration', 'fa-solid fa-football');

        // MATCHES START
        yield MenuItem::subMenu(' Les Matchs', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Créer un Match', 'fas fa-plus', FootballMatch::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Visualiser les Matchs', 'fas fa-eye', FootballMatch::class),
        ]);
        // MATCHES END

        // FOOTBALL PLAYER START
        yield MenuItem::subMenu('Les Joueurs de Football', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Créer un Joueur', 'fas fa-plus', FootballPlayer::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Visualiser les Joueurs', 'fas fa-eye', FootballPlayer::class),
        ]);
        // FOOTBALL PLAYER  END

        // TEAMS START
        yield MenuItem::subMenu(' Les Equipes', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Créer une équipe', 'fas fa-plus', Team::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Visualiser les équipes', 'fas fa-eye', Team::class),
        ]);
        // TEAMS END

        // SPORT BETS START
        yield MenuItem::subMenu('Les Paris Sportifs', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Créer un pari sportif', 'fas fa-plus', Sportbet::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Visualiser les Paris Sportifs', 'fas fa-eye', Sportbet::class),
        ]);
        // SPORT BETS END

        // USERS START
        yield MenuItem::subMenu('Les Utilisateurs', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Créer un Utilisateur', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Visualiser les Utilisateurs', 'fas fa-eye', User::class),
        ]);
        // USERS END
    }
}
