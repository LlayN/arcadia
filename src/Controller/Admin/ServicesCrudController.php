<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Services::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
             ->setEntityPermission('ROLE_EMPLOYE') 
            ->setEntityLabelInSingular('Service')
            ->setEntityLabelInPlural('Services')

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
            TextField::new('title')->setLabel('Nom'),
            TextField::new('description')->setLabel('Description'),
            ImageField::new('icon')->setLabel('Icône')->setUploadDir('/public/uploads/admin/services')->setBasePath('/uploads/admin/services')->setHelp('Un format SVG avec un fond transparent est fortement recommandé.')->setUploadedFileNamePattern('[contenthash].[extension]'),
            BooleanField::new('free')->setLabel('Service gratuit')
        ];
    }
}