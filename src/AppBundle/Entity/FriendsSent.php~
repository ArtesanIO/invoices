<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FriendsSent
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FriendsSentRepository")
 */
class FriendsSent
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
     * @ORM\ManyToOne(targetEntity="Friends", inversedBy="sent")
     * @ORM\JoinColumn(name="friends_id", referencedColumnName="id")
     */
    private $friends;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sent", type="datetime")
     */
    private $sent;

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
     * Set sent
     *
     * @param \DateTime $sent
     * @return FriendsSent
     */
    public function setSent($sent)
    {
        $this->sent = $sent;

        return $this;
    }

    /**
     * Get sent
     *
     * @return \DateTime 
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * Set friends
     *
     * @param \AppBundle\Entity\Friends $friends
     * @return FriendsSent
     */
    public function setFriends(\AppBundle\Entity\Friends $friends = null)
    {
        $this->friends = $friends;

        return $this;
    }

    /**
     * Get friends
     *
     * @return \AppBundle\Entity\Friends 
     */
    public function getFriends()
    {
        return $this->friends;
    }
}
