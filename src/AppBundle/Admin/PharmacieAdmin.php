<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\FieldDescriptionInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PharmacieAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $query = $this->getModelManager()->getEntityManager('Application\Sonata\MediaBundle\Entity\Media')
            ->createQueryBuilder('m')
            ->select('m')
            ->from('ApplicationSonataMediaBundle:Media','m')
            ->where('m.context = :section')
            ->setParameter('section','pharmacie')
        ;
        //dump($query->getDql());die();

        $imageFieldOptions = array('query' => $query);

        $form
            ->add('nom', 'text')
            ->add('ville', 'text')
            ->add('adresse', 'text')
            ->add('image','sonata_type_model',array('required' => false,'query' => $query),array('link_parameters' => array('context' => 'pharmacie')))
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
            ->add('image.providerReference',null,array('label' => 'Image'))
            ->add('_action',null,array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array()
                )
            ))
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('nom')->add('pharmacieGroupe');

    }
    
    public function configureShowFields(ShowMapper $show)
    {

        $show
            ->add('id')
            ->add('nom')
            ->add('ville')
            ->add('adresse')
            //->add('image','sonata_media_type')
            ->add('image',null,array('template' => 'AppBundle:default:image_show_field.html.twig'))
            ;
    }

}