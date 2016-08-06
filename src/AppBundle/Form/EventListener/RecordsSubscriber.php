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
            FormEvents::PRE_SUBMIT   => 'preSubmit',
            FormEvents::PRE_SET_DATA => 'preSetData',
        );
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if(isset($data["categories"])){

            $category = $data["categories"];

            $form
                ->add('concepts', 'entity', array(
                    'class' => 'AppBundle\Entity\Concepts',
                    'property' => 'concept',
                    'query_builder' => function(EntityRepository $er) use($category){
                        return $er->createQueryBuilder('concepts')
                            ->where('concepts.categories = :category')
                            ->setParameter('category', $category)
                            ;
                    },
                ));
        }

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
