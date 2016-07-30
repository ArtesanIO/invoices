<?php

namespace AppBundle\Form\EventListener;


use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class BlocksUsersSubscriber implements EventSubscriberInterface
{
    private $blockUsers;

    public function __construct($blockUsers)
    {
        $this->blockUsers = $blockUsers;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
        );
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();

        $form = $event->getForm();

        $form
            ->add('users','entity', array(
                'class' => 'AppBundle:User',
                'query_builder' => $this->blockUsers
                /*'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('users')
                        ->where('users.id IN (:users)')
                        ->setParameter('users', array(2,3,4));
                }*/
            ));

    }

}
