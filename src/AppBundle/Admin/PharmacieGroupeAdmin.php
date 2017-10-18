<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PharmacieGroupeAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $form)
    {
        $form->add('nom', 'text');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->add('nom')
            ->add('created')
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                )
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('nom')->add('id');
    }

}