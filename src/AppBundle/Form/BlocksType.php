<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlocksType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('block', null, array(
              'label' => 'sections.blocks.titles.block'
            ))
            ->add('currencys', 'entity', array(
              'class' => 'AppBundle:Currencys',
              'property' => 'currency',
              'empty_value' => 'form.empty_value',
              'label' => 'sections.blocks.titles.currencys'
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Blocks',
            'translation_domain' => 'messages'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'blocks';
    }
}
