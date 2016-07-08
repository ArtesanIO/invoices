<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Form\EventListener\AddCategoriasFieldSubscriber;

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
              'label' => 'sections.records.titles.record_date'
            ))
            ->add('typesRecord', 'entity', array(
              'class'       => 'AppBundle:TypesRecord',
              'property'    => 'typeRecord',
              'empty_value' => 'Seleccione',
              'label' => 'sections.records.titles.record_type',
              'expanded' => true
            ))
            ->add('categories', 'entity', array(
              'class'       => 'AppBundle:Categories',
              'property'    => 'category',
              'empty_value' => 'Seleccione',
              'label' => 'sections.records.titles.category',
            ))
            ->add('value', 'number', array(
              'label' => 'sections.records.titles.value',
            ))
            ->add('description','textarea', array(
              'label' => 'sections.records.titles.description',
            ))

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Records',
            'translation_domain' => 'messages'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'records';
    }
}
