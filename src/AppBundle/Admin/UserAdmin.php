<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\UserBundle\Admin\Model\UserAdmin as SoanaUserAdmin;
class UserAdmin extends SoanaUserAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        parent::configureDatagridFilters($datagridMapper);
        $datagridMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('dateOfBirth')
            ->add('firstname')
            ->add('lastname')
            ->add('website')
            ->add('biography')
            ->add('gender')
            ->add('locale')
            ->add('timezone')
            ->add('phone')
            ->add('facebookUid')
            ->add('facebookName')
            ->add('facebookData')
            ->add('twitterUid')
            ->add('twitterName')
            ->add('twitterData')
            ->add('gplusUid')
            ->add('gplusName')
            ->add('gplusData')
            ->add('token')
            ->add('twoStepVerificationCode')
            ->add('id')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);
        $listMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('createdAt')
            ->add('dateOfBirth')
            ->add('firstname')
            ->add('lastname')
            ->add('gender')
            ->add('phone')
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
        parent::configureFormFields($formMapper);
        $formMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('password')
            ->add('locked')
            ->add('expired')
            ->add('roles')
            ->add('dateOfBirth')
            ->add('firstname')
            ->add('lastname')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        parent::configureShowFields($showMapper);
        $showMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('dateOfBirth')
            ->add('firstname')
            ->add('lastname')
            ->add('website')
            ->add('biography')
            ->add('gender')
            ->add('locale')
            ->add('timezone')
            ->add('phone')
            ->add('facebookUid')
            ->add('facebookName')
            ->add('facebookData')
            ->add('twitterUid')
            ->add('twitterName')
            ->add('twitterData')
            ->add('gplusUid')
            ->add('gplusName')
            ->add('gplusData')
            ->add('token')
            ->add('twoStepVerificationCode')
            ->add('id')
        ;
    }
}
