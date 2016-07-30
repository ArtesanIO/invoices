<?php

namespace AppBundle\Form;

use AppBundle\Form\EventListener\BlocksUsersSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlocksUsersType extends AbstractType
{
    private $blockUsers;

    public function __construct($blockUsers)
    {
        $this->blockUsers = $blockUsers;
    }

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
              'choices' => array(1 => 'Owner', 2 => 'Editor', 3 => 'Viewer')
            ))
        ;

        $builder->addEventSubscriber(new BlocksUsersSubscriber($this->blockUsers));
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
