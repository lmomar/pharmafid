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
            ->add('creationDate');
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
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $query = $this->getModelManager()->getEntityManager($this->getClass())
            ->createQueryBuilder('m')
            ->select('m')
            ->from('ApplicationSonataMediaBundle:Media', 'm')
            ->where('m.context = :context')
            ->setParameter('context', 'coupon');

        $formMapper
            ->with(' ', array('class' => 'col-md-6', 'box_class' => 'box box-solid box-primary'))
                ->add('titre')
                ->add('code')
                ->add('image', 'sonata_type_model', array('required' => false, 'query' => $query), array('link_parameters' => array('context' => 'coupon')))
                ->add('remise')
                ->add('lacondition', null, array('label' => 'Condition'))
            ->end()
                ->with('  ', array('class' => 'col-md-6', 'box_class' => 'box box-solid box-primary'))
                ->add('dateDebut', 'sonata_type_date_picker')
                ->add('dateFin', 'sonata_type_date_picker')
                ->add('choiceType', 'choice', array('mapped' => false, 'choices' => ['' => 'Choisir', '0' => 'Pharmacie', '1' => 'Groupe'], 'attr' => ['class' => 'choicetype_groupephar']))
                ->add('pharmacie', 'sonata_type_model', array('attr' => ['class' => 'choice-pharmacie'], 'required' => false))
                ->add('pharmacieGroupe', null, array('label' => 'Groupe', 'attr' => ['class' => 'choice-groupe']))
                ->add('contenu', 'textarea', array('required' => false))
            ->end();
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('titre')
            ->add('image', null, array('template' => 'AppBundle:default:image_show_field.html.twig'))
            ->add('code')
            ->add('contenu')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('creationDate')
            ->add('remise')
            ->add('lacondition');
    }




}
