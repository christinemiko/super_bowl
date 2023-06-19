<?php

namespace App\Controller\Admin;

use App\Entity\Team;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
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
            ->setPageTitle('index','Les Equipes')
            ->setPageTitle('new', ' Créer une nouvelle Equipe')
            ->setPageTitle('edit', ' Modifier une Equipe');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            //PAGE INDEX START
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            //PAGE INDEX END

            //PAGE NEW START
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Créer');
            })

            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Créer et Ajouter+');
            })

           //PAGE NEW END

           //PAGE EDIT START
           ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
               return $action->setLabel('Sauvegarder et continuer');
           })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Sauvegarder');
            });
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
