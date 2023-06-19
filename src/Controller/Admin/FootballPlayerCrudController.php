<?php

namespace App\Controller\Admin;

use App\Entity\FootballPlayer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FootballPlayerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FootballPlayer::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Joueur')
            ->setEntityLabelInPlural('Joueurs')
            ->setPageTitle('index','Les Joueurs de Football')
            ->setPageTitle('new', ' Créer un nouveau Joueur')
            ->setPageTitle('edit', ' Modifier un Joueur');
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
            TextField::new('lastName', 'Nom'),
            TextField::new('firstName', 'Prénom'),
            IntegerField::new('playerNumber', 'Numéro du Joueur'),
            AssociationField::new('team', 'L\'équipe')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'class' => 'App\Entity\Team',
                    'choice_label' => 'teamName',
                    'attr' => [
                        'data-widget' => 'select2',
                    ],
                ])
                ->formatValue(function ($value, $entity) {
                    if ($entity instanceof FootballPlayer && $entity->getTeam() !== null) {
                        return $entity->getTeam()->getTeamName();
                    }
                    return $value;
                }),

            TextField::new('originCountry', 'Pays d\'origine du Joueur'),

        ];
    }

}
