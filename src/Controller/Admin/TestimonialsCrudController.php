<?php

namespace App\Controller\Admin;

use App\Entity\Testimonials;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TestimonialsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimonials::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
             ->setEntityPermission('ROLE_EMPLOYE') 
            ->setEntityLabelInSingular('Avis')
            ->setEntityLabelInPlural('Avis')

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

            TextField::new('username')->setLabel('Nom d\'utilisateur'),
            TextareaField::new('opinion')->setLabel('Avis'),
            BooleanField::new('isValid')->setLabel('Visible'),

        ];
    }
}