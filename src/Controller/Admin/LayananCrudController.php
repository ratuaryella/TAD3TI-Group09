<?php

namespace App\Controller\Admin;

use App\Entity\Layanan;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LayananCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Layanan::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nama'),
            TextField::new('deskripsi'),
            AssociationField::new('instansi')->autocomplete()
        ];
    }
}
