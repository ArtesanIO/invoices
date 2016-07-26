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

    /**
     * @ORM\OneToMany(targetEntity="Friends", mappedBy="guests", cascade={"persist"})
     */
    private $hosts;

    /**
     * @ORM\OneToMany(targetEntity="Friends", mappedBy="hosts", cascade={"persist"})
     */
    private $guests;

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

    /**
     * Add hosts
     *
     * @param \AppBundle\Entity\Friends $hosts
     * @return User
     */
    public function addHost(\AppBundle\Entity\Friends $hosts)
    {
        $this->hosts[] = $hosts;

        return $this;
    }

    /**
     * Remove hosts
     *
     * @param \AppBundle\Entity\Friends $hosts
     */
    public function removeHost(\AppBundle\Entity\Friends $hosts)
    {
        $this->hosts->removeElement($hosts);
    }

    /**
     * Get hosts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * Add guests
     *
     * @param \AppBundle\Entity\Friends $guests
     * @return User
     */
    public function addGuest(\AppBundle\Entity\Friends $guests)
    {
        $this->guests[] = $guests;

        return $this;
    }

    /**
     * Remove guests
     *
     * @param \AppBundle\Entity\Friends $guests
     */
    public function removeGuest(\AppBundle\Entity\Friends $guests)
    {
        $this->guests->removeElement($guests);
    }

    /**
     * Get guests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGuests()
    {
        return $this->guests;
    }
}
