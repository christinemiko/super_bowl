<?php

namespace App\Controller\Admin;

use App\Entity\FootballMatch;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\CrudAutocompleteType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class FootballMatchCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FootballMatch::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),

            DateField::new('matchDate'),

            AssociationField::new('team1')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'class' => 'App\Entity\Team',
                    'choice_label' => 'teamName',
                    'attr' => [
                        'data-widget' => 'select2',
                    ],
                ])
                ->formatValue(function ($value, $entity) {
                    if ($entity instanceof FootballMatch && $entity->getTeam1() !== null) {
                        return $entity->getTeam1()->getId();
                    }
                    return $value;
                }),

            AssociationField::new('team2')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'class' => 'App\Entity\Team',
                    'choice_label' => 'teamName',
                    'attr' => [
                        'data-widget' => 'select2',
                    ],
                ])
                ->formatValue(function ($value, $entity) {
                    if ($entity instanceof FootballMatch && $entity->getTeam2() !== null) {
                        return $entity->getTeam2()->getId();
                    }
                    return $value;
                }),


            TimeField::new('hourStart'),
            TimeField::new('hourFinish'),
            TextField::new('weather'),
            TextField::new('scoreGame'),
            ChoiceField::new('statut')
                ->setLabel('Statut')
                ->setChoices([
                    'Prochainement' => 'Prochainement',
                    'Terminé' => 'Terminé',
                    'En Cours' => 'En Cours',
                ]),
            TextEditorField::new('comments'),
        ];
    }

}
