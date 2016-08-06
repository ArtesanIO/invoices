<?php

namespace AppBundle\Model;

class BlocksManager extends ModelManager
{
    private $securityContext;
    private $blocksUsers;

    public function securityContext($security)
    {
        $this->securityContext = $security;
    }

    public function setBlocksUsers($blocksUsers)
    {
        $this->blocksUsers = $blocksUsers;
    }

    public function ownBlocks()
    {
        $user = $this->securityContext->getToken()->getUser();

        $blocks = $this->getRepository()->findBy(['users' => $user]);
        $blocksUsers = $this->blocksUsers->getRepository()->findBy(['users' => $user]);

        $meblocks = [];
        $othersblocks = [];

        foreach($blocks as $block){
            $meblocks[$block->getId()]['id'] = $block->getSlug();
            $meblocks[$block->getId()]['block'] = $block->getBlock();
            $meblocks[$block->getId()]['own'] = "You";
        }

        foreach($blocksUsers as $block){
            $othersblocks[$block->getId()]['id'] = $block->getBlocks()->getSlug();
            $othersblocks[$block->getId()]['block'] = $block->getBlocks()->getBlock();
            $othersblocks[$block->getId()]['own'] = $block->getBlocks()->getUsers()->getUsername();
        }

        return array_merge($meblocks, $othersblocks);

    }

}
