<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/10/17
 * Time: 22:44
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class QuestionAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->add('question')
            ->add('isFirst')
            ->add('qcm')
            ->add('countReponses')
            ->add('creationDate')
            ->add('_action',array(),array(
                'actions' => array(
                    'edit' => array(),
                    'show' => array('type_options' => array('class' => 'test')),
                    'delete' => array()
                )
            ))
            ;
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('question')
            ->add('isFirst')
            ->add('qcm')
            ->add('reponse','sonata_type_collection',
                array(
                    'by_reference' => false, // THIS IS WRONG!!!
                    'type_options' => array(
                        'delete' => true
                    )
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'inline',
                    'sortable'  => 'position',
                )
            )
            ->end()
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('question')
            ->add('qcm');
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add('id')
            ->add('question')
            ->add('isFirst',array(),array('label' => 'Premiére question'))
            ->add('reponse',array(),array('Les réponses'))
            ->add('creationDate',array(),array('label' => 'Crée le'))
            ->remove('add')
            ;
    }

}