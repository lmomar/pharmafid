<?php

namespace AppBundle\Admin;

use AppBundle\Form\SubReponseType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ReponseAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('valeur')
            ->add('creationDate');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('valeur')
            ->add('question','sonata_type_model_hidden')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $questionSuivanteOptions = array('btn_add' => false);
        $builder = $formMapper->getFormBuilder()->getFormFactory()->createBuilder(SubReponseType::class);
        $formMapper
                ->with('Réponse')
                    ->add('valeur')
                ->end()
                ->with('Question suivante')
                    ->add('questionSuivante', 'sonata_type_model', array('required' => false))
                ->end()
                ->with('Sous réponses')
                    ->add('childs','collection',array(
                        'type' => new SubReponseType(),
                        'allow_add' => true,
                        'allow_delete' => true,
                        'cascade_validation' => true,
                        'by_reference' => false
                    ))
                ->end()
            ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('valeur')
            ->add('creationDate');
    }
}
