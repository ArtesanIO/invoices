<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Form\EventListener\RecordsSubscriber;

class RecordsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recordDate', 'date', array(
              'placeholder' => array('year' => 'Año', 'month' => 'Mes', 'day' => 'Día'),
              'label' => 'sections.records.titles.record_date',
                'input' => 'datetime',
                'widget' => 'single_text',
            ))
            ->add('categories')
            ->add('concepts', 'entity', array(
                'class' => 'AppBundle\Entity\Concepts',
                'property' => 'concept'
            ))
            ->add('value', 'number', array(
              'label' => 'sections.records.titles.value',
            ))
            ->add('description','textarea', array(
              'label' => 'sections.records.titles.description',
            ))
        ;

        $builder->addEventSubscriber(new RecordsSubscriber($options['block']));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Records',
            'translation_domain' => 'messages',
            'required' => false
        ));

        $resolver->setRequired(['block']);

        $resolver->setAllowedTypes([
           'block' => 'object'
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'records';
    }
}
