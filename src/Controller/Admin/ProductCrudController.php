<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('subtitle'),
            SlugField::new('slug')
                ->setTargetFieldName('title'),
            TextEditorField::new('description'),
            MoneyField::new('price')
                ->setCurrency("EUR"),
            IntegerField::new('quantity_in_stock'),
            AssociationField::new('category'),
            ImageField::new('thumbnail')
                ->setBasePath('images//thumbnails/')
                ->setUploadDir('public//images//thumbnails/')
                ->setUploadedFileNamePattern('[contenthash].[extension]')
                ->setRequired(true),
            ImageField::new('image')
                ->setUploadedFileNamePattern('[day]-[month]-[year]-[slug]-[contenthash].[extension]')
                ->setUploadDir('//public//upload//products')
        ];
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
