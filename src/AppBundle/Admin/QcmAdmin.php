<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/10/17
 * Time: 22:36
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class QcmAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('titre', 'text')
            ->add('dateDebut', 'sonata_type_date_picker')
            ->add('dateFin', 'sonata_type_date_picker')
            ->add('pharmacie');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('id')
            ->addIdentifier('titre')
            ->add('dateDebut', 'date')
            ->add('dateFin', 'date')
            ->add('pharmacie')
            ->add('creationDate')
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                    'show' => array()
                )
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('titre')
            ->add('pharmacie')
            ;
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add('id')
            ->add('titre')
            ->add('dateDebut', 'date')
            ->add('dateFin', 'date')
            ->add('pharmacie')
            ->add('creationDate')
            ;
    }


}