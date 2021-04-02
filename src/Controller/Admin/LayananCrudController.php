<?php

namespace App\Controller\Admin;

use App\Entity\Layanan;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LayananCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Layanan::class;
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
