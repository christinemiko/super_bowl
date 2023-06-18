<?php

namespace App\Controller\Admin;

use App\Entity\FootballMatch;
use App\Entity\FootballPlayer;
use App\Entity\Sportbet;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\PropertyAccess\PropertyAccess;

class SportbetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sportbet::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Pari-sportif')
            ->setEntityLabelInPlural('Pari-sportifs')
            ->setPageTitle('index','Les Paris-sportifs');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            //Id
            IdField::new('id')->hideOnForm(),

            //DATE SPORTBET
            DateField::new('dateWagerMade', 'Date du Pari-Sportif'),

            //WAGER MADE
            IntegerField::new('wagerMade', 'Montant du Pari'),

            //TEAM
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

            //FOOTBALL MATCH
            AssociationField::new('footballMatch', 'Le Match')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'class' => 'App\Entity\FootballMatch',
                    'choice_label' => function ($footballMatch) {
                        $team1 = $footballMatch->getTeam1()->getTeamName();
                        $team2 = $footballMatch->getTeam2()->getTeamName();
                        return sprintf('%s _vs_ %s', $team1, $team2);
                    },
                    'attr' => [
                        'data-widget' => 'select2',
                    ],
                ])
                ->formatValue(function ($value, $entity) {
                    $accessor = PropertyAccess::createPropertyAccessor();
                    $footballMatchId = $accessor->getValue($entity, 'footballMatch.id');
                    return $footballMatchId;
                }),

            // MONEY WIN
            IntegerField::new('moneyGain', 'Gains du Pari'),

            // MONEY LOSE
            IntegerField::new('moneyLose', 'Pertes du Pari'),

            // USER
            AssociationField::new('user', 'Sélectionnez un Utilisateur')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'class' => 'App\Entity\User',
                    'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.lastName', 'ASC')
                            ->addOrderBy('u.firstName', 'ASC');
                    },
                    'choice_label' => function ($user) {
                        return $user->getLastName() . ' ' . $user->getFirstName();
                    },
                    'attr' => [
                        'data-widget' => 'select2',
                    ],
                ])



        ];
    }

}
