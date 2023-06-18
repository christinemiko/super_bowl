<?php

namespace App\Controller\Admin;

use App\Entity\FootballPlayer;
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
            ->setPageTitle('index','Les Joueurs de Football');
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
                        return $entity->getTeam()->getId();
                    }
                    return $value;
                }),

            TextField::new('originCountry', 'Pays d\'origine du Joueur'),

        ];
    }

}
