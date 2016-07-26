<?php

namespace AppBundle\Form\EventListener;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class RecordsSubscriber implements EventSubscriberInterface
{
    private $block;

    public function __construct($block)
    {
        $this->block = $block;
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
            ->add('categories', 'entity', array(
                'class'       => 'AppBundle:Categories',
                'choices' => $this->block->getCategories(),
                'property'    => 'category',
                'empty_value' => 'Seleccione',
                'label' => 'sections.records.titles.category',
                'group_by' => 'typesRecord.typeRecord',
            ));

    }

}
