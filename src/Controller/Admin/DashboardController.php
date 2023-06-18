<?php

namespace App\Controller\Admin;

use App\Entity\FootballMatch;
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
            ->setTitle('Super Bowl');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Administration');

        yield MenuItem::section('Match', 'fa-solid fa-football');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            menuItem::linkToCrud('Create FootballMatch', 'fas fa-plus', FootballMatch::class)->setAction(Crud::PAGE_NEW),
            menuItem::linkToCrud('Show FootballMatches', 'fas fa-eye', FootballMatch::class),
        ]);

        yield MenuItem::section('Joueur de Football');

        yield MenuItem::section('Equipes');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
