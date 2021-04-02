<?php

namespace App\Controller\Admin;

use App\Entity\Pertanyaan;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PertanyaanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pertanyaan::class;
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
