<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FriendsAccepted
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FriendsAcceptedRepository")
 */
class FriendsAccepted
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
     * @ORM\ManyToOne(targetEntity="Friends", inversedBy="accepted")
     * @ORM\JoinColumn(name="friends_id", referencedColumnName="id")
     */
    private $friends;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="accepted", type="datetime")
     */
    private $accepted;


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
     * @return FriendsAccepted
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
     * Set accepted
     *
     * @param \DateTime $accepted
     * @return FriendsAccepted
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;

        return $this;
    }

    /**
     * Get accepted
     *
     * @return \DateTime 
     */
    public function getAccepted()
    {
        return $this->accepted;
    }
}
