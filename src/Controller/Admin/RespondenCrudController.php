<?php

namespace App\Controller\Admin;

use App\Entity\Responden;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RespondenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Responden::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nama'),
            IntegerField::new('umur'),
            TextField::new('jk'),
            TextField::new('pendidikan'),
            TextField::new('pekerjaan'),
            AssociationField::new('layanan')->autocomplete()
        ];
    }
}
