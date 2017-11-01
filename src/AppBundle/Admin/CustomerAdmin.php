<?php

namespace AppBundle\Admin;

use Application\Sonata\UserBundle\Entity\User;
use FOS\UserBundle\Model\UserManagerInterface;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use \Sonata\UserBundle\Admin\Model\UserAdmin as BaseAdmin;
class CustomerAdmin extends BaseAdmin
{


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('sms')
            ->add('newsletter')
            ->add('sexe','doctrine_orm_string',array(),'choice',array('choices' => array('f' => 'Femme','m' => 'Homme')))
            ->add('creationDate',null,array('label' => 'Crée le'))
            ->add('user.username',null,array('label' => 'Login'))
            ->add('user.email',null,array('label' => 'Email'))
            ->add('pharmacie',null,array('label' => 'Pharmacie'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('user.username')
            ->add('user.email')
            ->add('user.gender',null,array('template' => 'AppBundle:default:sexe_field.html.twig','label' => 'Sexe'))
            ->add('user.enabled',null,array('label' => 'Actif'))
            ->add('user.dateOfBirth',null,array('label' => 'Née le'))
            ->add('sms')
            ->add('newsletter')
            ->add('pharmacie')
            ->add('creationDate',null,array('label' => 'Crée le'))
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
        //dump($this->getSubject()->getUser()->getUsername());die();
        $data = new User();
        if($this->getSubject()->getUser()){
            $data = $this->getSubject()->getUser();
        }
        $formMapper
            ->with('Informations personnelles',array('class' => 'col-md-6','box_class'   => 'box box-solid box-primary'))
                ->add('user','sonata_type_admin',array('data' => $data,'label' => false),array('admin_code' => 'application_sonata_user.admin.customer_user'))

            ->end()
            ->with('Informations supplémentaires',array('class' => 'col-md-6','box_class'   => 'box box-solid box-primary'))
                ->add('sms')
                ->add('newsletter')
                ->add('pharmacie',null,array('required' => true))
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Personnel',array('class' => 'col-md-6','box_class' => 'box box-solid box-primary'))
            ->add('id')
            ->add('user.username',null,array('label' => 'Login'))
            ->add('user.email',null,array('label' => 'Email'))
            ->add('user.enabled',null,array('label' => 'Actif'))
            ->add('user.dateOfBirth',null,array('label' => 'Née le'))
            ->end()
            ->with('Supplementaire',array('class' => 'col-md-6','box_class' => 'box box-solid box-primary'))
            ->add('sms')
            ->add('newsletter')
            ->add('sexe')
            ->add('creationDate')
            ->end()
        ;
    }

    public function preUpdate($user)
    {
        //dump($user->getUser());die();
        $this->getUserManager()->updateCanonicalFields($user->getUser());
        $this->getUserManager()->updatePassword($user->getUser());
    }

    public function setUserManager(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    public function getUserManager()
    {
        return $this->userManager;
    }

    public function getExportFields()
    {

        return array('id','user.username','user.email');
    }





}
