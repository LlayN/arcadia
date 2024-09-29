<?php

namespace App\Controller\Admin;

use App\Entity\EmployeesReports;
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

class EmployeesReportsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EmployeesReports::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular(label: 'Rapport')
            ->setEntityLabelInPlural('Rapports Employés');
    }


    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('animal')
            ->add('datetime')

        ;
    }

      public function configureActions(Actions $actions): Actions
     {
         return $actions

             ->setPermission(Action::NEW , 'ROLE_EMPLOYE')
             ->setPermission(Action::EDIT, 'ROLE_EMPLOYE')
             ->setPermission(Action::DELETE, 'ROLE_EMPLOYE')
             ->setPermission(Action::BATCH_DELETE, 'ROLE_EMPLOYE');
     } 
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('animal')->setLabel('Animal concerné'),
            TextField::new('food')->setLabel('Nourriture distribuée'),  
            NumberField::new('quantity')->setLabel('Quantité distribué (en kilos)'),
            DateTimeField::new('datetime')->setLabel('Date/heure de distribution'),
        ];
    }
}