<?php

namespace App\Controller\Admin;

use App\Entity\FootballPlayer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FootballPlayerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FootballPlayer::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
