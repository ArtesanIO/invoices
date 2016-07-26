<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $translator = $this->container->get('translator');

        $menu->addChild($translator->trans('sections.blocks.title'), array('route' => 'blocks'));
        $menu->addChild($translator->trans('sections.friends.title'), array('route' => 'friends'));
      
        return $menu;
    }
}
