<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlockUsersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('blocksUsers', 'collection', array(
                'type' => new BlocksUsersType($options['blockUsers']),
                'by_reference' => false,
                'allow_delete' => true,
                'allow_add' => true
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

        $resolver->setRequired(['blockUsers']);

        $resolver->setAllowedTypes([
            'blockUsers' => 'object'
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'block_users';
    }
}
