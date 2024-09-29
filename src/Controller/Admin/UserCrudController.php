<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityPermission('ROLE_ADMIN')
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs')
        ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->setPermission(Action::NEW , 'ROLE_ADMIN')
            ->setPermission(Action::EDIT, 'ROLE_ADMIN')
            ->setPermission(Action::DELETE, 'ROLE_ADMIN')
            ->setPermission(Action::BATCH_DELETE, 'ROLE_ADMIN');
    }




    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('img')->setLabel('Photo de profil')->setBasePath('/uploads/admin/profiles/')->setUploadDir('public/uploads/admin/profiles'),
            EmailField::new('email')->setLabel('Nom d\'utilisateur')->setHelp('Une adresse mail est attendue.'),
            TextField::new('password')->setLabel('Mot de passe')->onlyOnForms(),
            TextField::new('name')->setLabel('Prénom'),
            TextField::new('surname')->setLabel('Nom de famille'),
            ChoiceField::new('roles')->setLabel('Fonction')
                ->setChoices([
                    'Administrateur' => 'ROLE_ADMIN',
                    'Employé' => 'ROLE_EMPLOYE',
                    'Vétérinaire' => 'ROLE_VETO'
                ])
                ->allowMultipleChoices(true)

                ->setFormTypeOption('multiple', true) 
        ];
    }
}