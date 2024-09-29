<?php

namespace App\Controller\Admin;

use App\Entity\Animals;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnimalsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animals::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
             ->setEntityPermission('ROLE_VETO')
            ->setEntityLabelInSingular('Animal')
            ->setEntityLabelInPlural('Animaux')

        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('living')
            ->add('breed')
        ;
    }

     public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->setPermission(Action::NEW , 'ROLE_VETO')
            ->setPermission(Action::EDIT, 'ROLE_VETO')
            ->setPermission(Action::DELETE, 'ROLE_VETO')
            ->setPermission(Action::BATCH_DELETE, 'ROLE_VETO');
    } 

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('img')->setLabel('Photo')->setUploadDir('public/uploads/admin/animals')->setBasePath('uploads/admin/animals'),
            TextField::new('name')->setLabel('Nom'),
            AssociationField::new('living')->setLabel('Habitat'),
            AssociationField::new('breed')->setLabel('Race'),

        ];
    }
}