<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FriendsRemoved
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FriendsRemovedRepository")
 */
class FriendsRemoved
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
     * @ORM\ManyToOne(targetEntity="Friends", inversedBy="removed")
     * @ORM\JoinColumn(name="friends_id", referencedColumnName="id")
     */
    private $friends;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="removed", type="datetime")
     */
    private $removed;


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
     * Set friends
     *
     * @param integer $friends
     * @return FriendsRemoved
     */
    public function setFriends($friends)
    {
        $this->friends = $friends;

        return $this;
    }

    /**
     * Get friends
     *
     * @return integer 
     */
    public function getFriends()
    {
        return $this->friends;
    }

    /**
     * Set removed
     *
     * @param \DateTime $removed
     * @return FriendsRemoved
     */
    public function setRemoved($removed)
    {
        $this->removed = $removed;

        return $this;
    }

    /**
     * Get removed
     *
     * @return \DateTime 
     */
    public function getRemoved()
    {
        return $this->removed;
    }
}
