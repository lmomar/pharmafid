<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 05/10/17
 * Time: 20:30
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TabletteAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('marque')
            ->add('modele')
            ->add('serie')
            ->add('etat')
            ->add('pharmacie')
            ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('id')
            ->add('marque')
            ->add('modele')
            ->addIdentifier('serie')
            ->add('page')
            ->add('etat')
            ->add('pharmacie')
            ->add('creationDate')
            ->add('_action',null,array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array()
                )
            ))
            ;
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('marque')
            ->add('modele')
            ->add('serie')
            ->add('pharmacie',null,array('required' => true))
            ;
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add('id')
            ->add('marque')
            ->add('modele')
            ->add('serie')
            ->add('page')
            ->add('etat')
            ->add('pharmacie')
            ->add('creationDate')
            ;
    }

}