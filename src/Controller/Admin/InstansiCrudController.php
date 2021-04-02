<?php

namespace App\Controller\Admin;

use App\Entity\Instansi;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InstansiCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Instansi::class;
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
