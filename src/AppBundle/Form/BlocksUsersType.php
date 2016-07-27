<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlocksUsersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('users','entity', array(
              'class' => 'AppBundle:User',
              'property' => 'username'
            ))
            ->add('role', 'choice', array(
              'choices' => array(1 => 'Own', 2 => 'Editor', 3 => 'Viewer')
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\BlocksUsers'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'blocks_users';
    }
}
