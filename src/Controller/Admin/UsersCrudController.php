<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs')
        ;
    }




    public function configureFields(string $pageName): iterable
    {
        return [

            EmailField::new('email')->setLabel('Nom d\'utilisateur')->setHelp('Une adresse mail est attendue.'),
            TextField::new('password')->setLabel('Mot de passe')->onlyOnForms(),
            TextField::new('name')->setLabel('Prénom'),

            TextField::new('surname')->setLabel('Nom de famille'),

            /* ChoiceField::new('roles')->setLabel('Fonction')
                ->setChoices([
                    'Administrateur' => 'ROLE_ADMIN',
                    'Employé' => 'ROLE_EMPLOYE',
                    'Vétérinaire' => 'ROLE_VETO'
                ])
                ->allowMultipleChoices(true)

                ->setFormTypeOption('multiple', true) */
        ];
    }
}