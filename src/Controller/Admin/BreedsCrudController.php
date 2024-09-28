<?php

namespace App\Controller\Admin;

use App\Entity\Breeds;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BreedsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Breeds::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            /* ->setEntityPermission('ROLE_VETO') */
            ->setEntityLabelInSingular('Race')
            ->setEntityLabelInPlural('Races');
    }

    /* public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->setPermission(Action::NEW , 'ROLE_VETO')
            ->setPermission(Action::EDIT, 'ROLE_VETO')
            ->setPermission(Action::DELETE, 'ROLE_VETO')
            ->setPermission(Action::BATCH_DELETE, 'ROLE_VETO');
    } */

    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('name')->setLabel('Nom'),

        ];
    }
}