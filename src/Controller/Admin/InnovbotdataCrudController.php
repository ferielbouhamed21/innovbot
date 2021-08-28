<?php

namespace App\Controller\Admin;

use App\Entity\Innovbotdata;
use App\Repository\InnovbotdataRepository;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FilterConfigDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\HttpFoundation\Response;

class InnovbotdataCrudController extends AbstractCrudController
{
    protected $innovbotdataRepository;
    public function __construct( InnovbotdataRepository $innovbotdataRepository){
        $this->innovbotdataRepository = $innovbotdataRepository;
    }

    public static function getEntityFqcn(): string
    {
        return Innovbotdata::class;
    }
    public function configureFields(string $pageName): iterable
    {

        return [
            IntegerField::new('id' , 'ID')->onlyOnIndex(),
            TextField::new('departement'),
            TextField::new('isexistingidea'),
            TextField::new('ideashare'),
            TextField::new('product_or_process'),
            TextField::new('substitute'),
            TextField::new('substitute_details'),
            TextField::new('combine'),
            TextField::new('combine_details'),
            TextField::new('adapt'),
            TextField::new('adapt_details'),
            TextField::new('modify'),
            TextField::new('modify_details'),
            TextField::new('put_to_another_use'),
            TextField::new('put_to_another_use_details'),
            TextField::new('eliminate'),
            TextField::new('eliminate_details'),
            TextField::new('reverse_idea'),
            TextField::new('reverse_details'),
            TextField::new('specific_goal'),
            TextField::new('specific_details'),
            TextField::new('measureable'),
            TextField::new('measureable_details'),
            TextField::new('attainable'),
            TextField::new('attainable_details'),
            TextField::new('relevant'),
            TextField::new('relevant_details'),
            TextField::new('time_based'),
            TextField::new('time_based_details'),
            BooleanField::new('isValidated'),
            BooleanField::new('isPrioritized'),
            BooleanField::new('isInDevelopment'),
            BooleanField::new('isAchieved'),
        ];

    }
    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $response = $this->get(EntityRepository::class)->createQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $response->andWhere("entity.isexistingidea Like 'yes'");
        return $response;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('departement')
            ->add('product_or_process')
            ->add('ideashare')
            ->add('substitute')
            ->add('substitute_details')
            ->add('combine')
            ->add('combine_details')
            ->add('adapt')
            ->add('adapt_details')
            ->add('modify')
            ->add('modify_details')
            ->add('put_to_another_use')
            ->add('put_to_another_use_details')
            ->add('eliminate')
            ->add('eliminate_details')
            ->add('reverse_idea')
            ->add('reverse_details')
            ->add('specific_goal')
            ->add('specific_details')
            ->add('measureable')
            ->add('measureable_details')
            ->add('attainable')
            ->add('attainable_details')
            ->add('relevant')
            ->add('relevant_details')
            ->add('time_based')
            ->add('time_based_details')
            ->add('isValidated')
            ->add('isPrioritized')
            ->add('isInDevelopment')
            ->add('isAchieved');
    }
}
