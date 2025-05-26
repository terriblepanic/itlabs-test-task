<?php

namespace App\Controller\Admin;

use App\Entity\Table;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class TableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Table::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id', 'ID')->hideOnForm();

        yield TextField::new('number', 'Номер стола');

        yield TextField::new('description', 'Описание');

        yield IntegerField::new('maxPeople', 'Макс количество человек');

        yield IntegerField::new('guestsCount', 'Гостей')
            ->onlyOnIndex();
        yield IntegerField::new('guestsCount', 'Гостей')
            ->onlyOnDetail();

        yield IntegerField::new('presentGuestsCount', 'Присутствует гостей')
            ->onlyOnIndex();
        yield IntegerField::new('presentGuestsCount', 'Присутствует гостей')
            ->onlyOnDetail();

    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Стол')
            ->setEntityLabelInPlural('Столы')
            ->setPageTitle('index', 'Столы')
            ->setPageTitle('new', 'Создать стол')
            ->setPageTitle('edit', 'Редактировать стол')
            ->setPageTitle('detail', fn(Table $table) => 'Стол ' . $table->getNumber());
    }
}
