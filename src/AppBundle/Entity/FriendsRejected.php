<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FriendsRejected
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FriendsRejectedRepository")
 */
class FriendsRejected
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
     * @ORM\ManyToOne(targetEntity="Friends", inversedBy="rejected")
     * @ORM\JoinColumn(name="friends_id", referencedColumnName="id")
     */
    private $friends;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rejected", type="datetime")
     */
    private $rejected;


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
     * @return FriendsRejected
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
     * Set rejected
     *
     * @param \DateTime $rejected
     * @return FriendsRejected
     */
    public function setRejected($rejected)
    {
        $this->rejected = $rejected;

        return $this;
    }

    /**
     * Get rejected
     *
     * @return \DateTime 
     */
    public function getRejected()
    {
        return $this->rejected;
    }
}
