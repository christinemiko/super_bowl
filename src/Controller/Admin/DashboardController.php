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
        yield MenuItem::section('Administration', 'fa-solid fa-football');

        // MATCHES START
        yield MenuItem::subMenu('Matches', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Create FootballMatch', 'fas fa-plus', FootballMatch::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Show FootballMatches', 'fas fa-eye', FootballMatch::class),
        ]);
        // MATCHES END

        // FOOTBALL PLAYER START
        yield MenuItem::subMenu('FootballMatch Players', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Create Football Player', 'fas fa-plus', FootballPlayer::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Show Football Players', 'fas fa-eye', FootballPlayer::class),
        ]);
        // FOOTBALL PLAYER  END

        // TEAMS START
        yield MenuItem::subMenu('Teams', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Create Team', 'fas fa-plus', Team::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Show Teams', 'fas fa-eye', Team::class),
        ]);
        // TEAMS END

        // SPORT BETS START
        yield MenuItem::subMenu('Sport Bets', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Create Sport bet', 'fas fa-plus', Sportbet::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Show Sport Bets', 'fas fa-eye', Sportbet::class),
        ]);
        // SPORT BETS END

        // USERS START
        yield MenuItem::subMenu('Users', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Create User', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Show Users', 'fas fa-eye', User::class),
        ]);
        // USERS END
    }
}
