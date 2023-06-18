<?php

namespace App\Controller\Admin;

use App\Entity\Team;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TeamCrudController extends AbstractCrudController
{
    public const TEAMS_BASE_PATH = 'img/teams';
    public const TEAMS_UPLOAD_DIR = 'public/img/teams';

    public static function getEntityFqcn(): string
    {
        return Team::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Equipe')
            ->setEntityLabelInPlural('Equipes')
            ->setPageTitle('index','Les Equipes');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('teamName', 'Nom de l\'équipe'),
            TextField::new('regionOrigin', 'Région d\'origine'),
            TextField::new('oddsteam', ' La Cote de l\'équipe/ Exemples: 2.10 ou 3.25 ou 1.00'),
            ImageField::new('link', 'Sélectionnez votre image pour le Logo')
                        ->setBasePath(self::TEAMS_BASE_PATH)
                        ->setUploadDir(self::TEAMS_UPLOAD_DIR),


        ];
    }

}
