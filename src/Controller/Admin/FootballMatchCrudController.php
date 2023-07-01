<?php

namespace App\Controller\Admin;

use App\Entity\FootballMatch;
use App\Entity\FootballPlayer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;

class FootballMatchCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return FootballMatch::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Match')
            ->setEntityLabelInPlural('Matchs')
            ->setPageTitle('index','Les Matchs')
            ->setPageTitle('new', ' Créer un nouveau Match')
             ->setPageTitle('edit', ' Modifier un Match');
    }

    public function configureActions(Actions $actions): Actions
    {
        // Créez une nouvelle action personnalisée
        $setDeleted = Action::new('setDeleted', 'Marquer comme supprimé')
            ->linkToCrudAction('setDeleted')
            ->addCssClass('btn btn-danger');

        return $actions

            //PAGE INDEX START
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            // Désactivez l'action de suppression par défaut
            ->disable(Action::DELETE)
            // Ajoutez l'action personnalisée à la page d'index
            ->add(Crud::PAGE_INDEX, $setDeleted)
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
            })

            ;

    }

    public function configureFields(string $pageName): iterable
    {

        $statusChoices = [
            'Prochainement' => 'Prochainement',
            'A Venir' => 'A Venir',
            'En Cours' => 'En Cours',
        ];

        return [
            IdField::new('id')->hideOnForm(),

            DateField::new('matchDate', 'Date du Match'),

            AssociationField::new('team1', ' l\'équipe 1')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'class' => 'App\Entity\Team',
                    'choice_label' => 'teamName',
                    'choice_value' => 'id',
                    'attr' => [
                        'data-widget' => 'select2',
                    ],
                ])
                ->formatValue(function ($value, $entity) {
                    if ($entity instanceof FootballMatch && $entity->getTeam1() !== null) {
                        return $entity->getTeam1()->getTeamName();
                    }
                    return $value;
                }),

            AssociationField::new('team2', ' l\'équipe 2')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions([
                    'class' => 'App\Entity\Team',
                    'choice_label' => 'teamName',
                    'choice_value' => 'id',
                    'attr' => [
                        'data-widget' => 'select2',
                    ],
                ])
                ->formatValue(function ($value, $entity) {
                    if ($entity instanceof FootballMatch && $entity->getTeam2() !== null) {
                        return $entity->getTeam2()->getTeamName();
                    }
                    return $value;
                }),

            TimeField::new('hourStart', 'Heure de début'),
            TimeField::new('hourFinish', 'Heure de fin'),
            TextField::new('weather', 'Météo'),
            TextField::new('scoreGame', 'Score du Jeu'),

            ChoiceField::new('statut')
                ->setLabel( 'Statut ')
                ->setChoices([
                    'Prochainement' => 'Prochainement',
                    'Terminé' => 'Terminé',
                    'Actuellement' => 'Actuellement'
                ]),

            TextEditorField::new('comments', 'Commentaires'),

            BooleanField::new('deleted', 'Deleted'),

        ];
    }

    public function setDeleted(AdminContext $context, EntityManagerInterface $entityManager): Response
    {
        $data = $context->getEntity()->getInstance();

        if (!$data instanceof FootballMatch) {
            throw new \RuntimeException(sprintf('Expected a FootballMatch object, %s given.', get_class($data)));
        }

        $data->setDeleted(true);
        $entityManager->flush();
        $this->addFlash('success', 'Match marqué comme supprimé.');
        return $this->redirectToRoute('app_admin');
    }

}
