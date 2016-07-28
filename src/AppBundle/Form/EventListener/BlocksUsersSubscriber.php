<?php

namespace AppBundle\Form\EventListener;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class BlocksUsersSubscriber implements EventSubscriberInterface, ContainerAwareInterface
{
    protected $container;

    public function setContainer(ContainerInterface $container = NULL)
    {
        $this->container = $container;
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
        
        echo '<pre>';print_r($this->container);exit();
        
        $form
            ->add('users','entity', array(
                'class' => 'AppBundle:User',
                'property' => 'username'
            ));

    }

}
