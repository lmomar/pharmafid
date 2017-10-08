<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PharmacieAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $image = array();
        $form
            ->add('nom', 'text')
            ->add('ville', 'text')
            ->add('adresse', 'text')
            ->add('imageFile','file')
            ->add('pharmacieGroupe')
            ;
    }

    protected function configureListFields(ListMapper $list)
    {

        $list
            ->addIdentifier('id')
            ->add('nom')
            ->add('ville')
            ->add('adresse')
            ->add('image')
            ->add('_action',null,array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                    'show' => array()
                )
            ))
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('nom');
    }




}