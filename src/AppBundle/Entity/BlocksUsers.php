<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlocksUsers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BlocksUsersRepository")
 */
class BlocksUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Blocks", inversedBy="blocksUsers")
     * @ORM\JoinColumn(name="block_id", referencedColumnName="id")
     */
    private $blocks;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="blocksUsers")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $users;

    /**
     * @var integer
     *
     * @ORM\Column(name="role", type="integer")
     */
    private $role;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set role
     *
     * @param integer $role
     * @return BlocksUsers
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return integer 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set blocks
     *
     * @param \AppBundle\Entity\Blocks $blocks
     * @return BlocksUsers
     */
    public function setBlocks(\AppBundle\Entity\Blocks $blocks = null)
    {
        $this->blocks = $blocks;

        return $this;
    }

    /**
     * Get blocks
     *
     * @return \AppBundle\Entity\Blocks 
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\User $users
     * @return BlocksUsers
     */
    public function setUsers(\AppBundle\Entity\User $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
