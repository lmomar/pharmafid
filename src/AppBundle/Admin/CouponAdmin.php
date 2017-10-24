<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CouponAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titre')
            ->add('code')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('creationDate')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('titre')
            ->add('image')
            ->add('code')
            ->add('remise')
            ->add('lacondition')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('creationDate')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titre')
            ->add('imageFile','file',array('label' => 'Image'))
            ->add('code')
            ->add('remise')
            ->add('lacondition',null,array('label' => 'Condition'))
            ->add('dateDebut','sonata_type_date_picker')
            ->add('dateFin','sonata_type_date_picker')
            ->add('contenu','textarea')

        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('titre')
            ->add('image')
            ->add('code')
            ->add('contenu')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('creationDate')
            ->add('remise')
            ->add('lacondition')
        ;
    }
}
