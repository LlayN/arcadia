<?php

namespace App\Controller\Admin;

use App\Entity\VeterinariansReports;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VeterinariansReportsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VeterinariansReports::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            /* ->setEntityPermission('ROLE_VETO') */
            ->setEntityLabelInSingular('Rapport')
            ->setEntityLabelInPlural('Rapports Vétérinaires');


    }

    /* public function configureActions(Actions $actions): Actions
    {
        return $actions

            ->setPermission(Action::NEW , 'ROLE_VETO')
            ->setPermission(Action::EDIT, 'ROLE_VETO')
            ->setPermission(Action::DELETE, 'ROLE_VETO')
            ->setPermission(Action::BATCH_DELETE, 'ROLE_VETO');
    } */

    public function configureFilters(Filters $filters): Filters
    {
        return $filters

            ->add('animal')
            ->add('datetime')

        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('animal')->setLabel('Animal'),
            DateTimeField::new('datetime')->setLabel('Date de passage'),
            ChoiceField::new('state')->setLabel('État médical')
                ->setChoices([
                    'Très mauvaise santé' => 'Très mauvaise santé',
                    'Mauvaise santé' => 'Mauvaise santé',
                    'Bonne santé' => 'Bonne santé',
                    'Très bonne santé' => 'Très bonne santé',

                ]),
            TextEditorField::new('description')->setLabel('Détails'),
            ChoiceField::new('diet')->setLabel('Régime alimentaire')
                ->setChoices([
                    'Viandes' => 'Viandes',
                    'Légumes' => 'Légumes',
                    'Fruits' => 'Fruits',
                    'Plantes' => 'Plantes',
                    'Poisson' => 'Poisson',
                    'Insectes' => 'Insectes',
                    'Autre' => 'Autre',
                ])
                ->allowMultipleChoices(false),
            NumberField::new('quantity')->setLabel('Quantité par Jour (en kilos)'),

        ];

    }
}