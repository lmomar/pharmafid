<?php

namespace Application\Sonata\UserBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use \Sonata\UserBundle\Admin\Model\UserAdmin as BaseAdmin;

class CustomerUserAdmin extends BaseAdmin
{




    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Genéral', array('class' => 'col-md-6'))
                ->add('firstname', null, array('label' => 'Nom', 'required' => true))
                ->add('lastname', null, array('label' => 'Prénom', 'required' => true))
                ->add('phone')
                ->add('username')
                ->add('email')
                ->add('plainPassword', 'text', array('required' => false, 'label' => 'Mot de passe'))
                ->add('dateOfBirth', 'date', array('label' => 'Née le', 'years' => range(1940, date('Y')), 'format' => 'd MMMM yyyy'))
                ->add('gender', 'choice', array('choices' => array('m' => 'Homme', 'f' => 'Femme')))
            ->end()
            ->with('Complémentaires', array('class' => 'col-md-6'))
                ->add('enabled')
            ->end()
            ;

    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('locked')
            ->add('roles')
            ->add('createdAt')
            ->add('dateOfBirth')
            ->add('firstname')
            ->add('lastname')
            ->add('filterGender')
            ->add('phone')
            ->add('id');
    }


}
