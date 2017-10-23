<?php
namespace AppBundle\Admin\Pharmacien;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CouponAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('titre')
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('id')
            ->addIdentifier('titre')
            ->add('image')
            ->add('code')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('remise')
            ->add('lacondition')
            ->add('pharmacie')
            ->add('pharmacieGroup')
            ->add('dateCreation')
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('titre')
        ;
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add('titre')
            ;
    }


}