<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Blocks", mappedBy="User", cascade={"persist"})
     */

    private $blocks;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add blocks
     *
     * @param \AppBundle\Entity\Blocks $blocks
     * @return User
     */
    public function addBlock(\AppBundle\Entity\Blocks $blocks)
    {
        $this->blocks[] = $blocks;

        return $this;
    }

    /**
     * Remove blocks
     *
     * @param \AppBundle\Entity\Blocks $blocks
     */
    public function removeBlock(\AppBundle\Entity\Blocks $blocks)
    {
        $this->blocks->removeElement($blocks);
    }

    /**
     * Get blocks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlocks()
    {
        return $this->blocks;
    }
}
