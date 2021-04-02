<?php

namespace App\Controller\Admin;

use App\Entity\Responden;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RespondenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Responden::class;
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
