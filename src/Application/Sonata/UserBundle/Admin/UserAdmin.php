<?php

namespace Application\Sonata\UserBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use \Sonata\UserBundle\Admin\Model\UserAdmin as BaseAdmin;

class UserAdmin extends BaseAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('locked')
            ->add('roles')
            ->add('dateOfBirth')
            ->add('firstname')
            ->add('lastname')
            ->add('gender')
            ->add('phone');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', 'text', array('label' => 'ID'))
            ->add('firstname')
            ->add('lastname')
            ->add('username', 'text', array('label' => 'Login'))
            ->add('email', 'text', array('label' => 'email'))
            ->add('filterGender', 'string', array('label' => 'Civlité'))
            ->add('phone', 'text', array('label' => 'Téléphone'))
            ->add('enabled')
            ->add('roles',null,array('template' => 'AppBundle:default:roles_list_field.html.twig'))
            ->add('createdAt')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array()
                ),'label' => 'Actions'
            ));
    }


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
                ->add('roles','choice',['multiple' => true,'choices' => ['ROLE_ADMIN' => 'ADMIN','ROLE_PHARMACIEN' => 'PHARMACIEN']])
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

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->where(
            $query->expr()->like($query->getRootAlias() . '.roles', ':roles')
        );
        $query->setParameter('roles', '%ROLE_ADMIN%');
        return $query;
    }



}
