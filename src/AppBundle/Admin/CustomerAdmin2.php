<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 24/10/17
 * Time: 09:39
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use \Sonata\UserBundle\Admin\Model\UserAdmin as BaseAdmin;
class CustomerAdmin2 extends BaseAdmin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('user.username')
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper->add('sms');
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper->add('sms');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('sms');
    }



}