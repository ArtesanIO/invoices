<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friends
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FriendsRepository")
 */
class Friends
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="guests")
     * @ORM\JoinColumn(name="user_host_id", referencedColumnName="id")
     */
    private $hosts;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="hosts")
     * @ORM\JoinColumn(name="user_guest_id", referencedColumnName="id")
     */
    private $guests;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer")
     */
    private $state;

    /**
     * @ORM\OneToMany(targetEntity="FriendsSent", mappedBy="friends", cascade={"persist"})
     */
    private $sent;

    /**
     * @ORM\OneToMany(targetEntity="FriendsAccepted", mappedBy="friends", cascade={"persist"})
     */
    private $accepted;

    /**
     * @ORM\OneToMany(targetEntity="FriendsRejected", mappedBy="friends", cascade={"persist"})
     */
    private $rejected;

    /**
     * @ORM\OneToMany(targetEntity="FriendsRemoved", mappedBy="friends", cascade={"persist"})
     */
    private $removed;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sent = new \Doctrine\Common\Collections\ArrayCollection();
        $this->accepted = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rejected = new \Doctrine\Common\Collections\ArrayCollection();
        $this->removed = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set state
     *
     * @param integer $state
     * @return Friends
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set hosts
     *
     * @param \AppBundle\Entity\User $hosts
     * @return Friends
     */
    public function setHosts(\AppBundle\Entity\User $hosts = null)
    {
        $this->hosts = $hosts;

        return $this;
    }

    /**
     * Get hosts
     *
     * @return \AppBundle\Entity\User 
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * Set guests
     *
     * @param \AppBundle\Entity\User $guests
     * @return Friends
     */
    public function setGuests(\AppBundle\Entity\User $guests = null)
    {
        $this->guests = $guests;

        return $this;
    }

    /**
     * Get guests
     *
     * @return \AppBundle\Entity\User 
     */
    public function getGuests()
    {
        return $this->guests;
    }

    /**
     * Add sent
     *
     * @param \AppBundle\Entity\FriendsSent $sent
     * @return Friends
     */
    public function addSent(\AppBundle\Entity\FriendsSent $sent)
    {
        $this->sent[] = $sent;

        return $this;
    }

    /**
     * Remove sent
     *
     * @param \AppBundle\Entity\FriendsSent $sent
     */
    public function removeSent(\AppBundle\Entity\FriendsSent $sent)
    {
        $this->sent->removeElement($sent);
    }

    /**
     * Get sent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * Add accepted
     *
     * @param \AppBundle\Entity\FriendsAccepted $accepted
     * @return Friends
     */
    public function addAccepted(\AppBundle\Entity\FriendsAccepted $accepted)
    {
        $this->accepted[] = $accepted;

        return $this;
    }

    /**
     * Remove accepted
     *
     * @param \AppBundle\Entity\FriendsAccepted $accepted
     */
    public function removeAccepted(\AppBundle\Entity\FriendsAccepted $accepted)
    {
        $this->accepted->removeElement($accepted);
    }

    /**
     * Get accepted
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccepted()
    {
        return $this->accepted;
    }

    /**
     * Add rejected
     *
     * @param \AppBundle\Entity\FriendsRejected $rejected
     * @return Friends
     */
    public function addRejected(\AppBundle\Entity\FriendsRejected $rejected)
    {
        $this->rejected[] = $rejected;

        return $this;
    }

    /**
     * Remove rejected
     *
     * @param \AppBundle\Entity\FriendsRejected $rejected
     */
    public function removeRejected(\AppBundle\Entity\FriendsRejected $rejected)
    {
        $this->rejected->removeElement($rejected);
    }

    /**
     * Get rejected
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRejected()
    {
        return $this->rejected;
    }

    /**
     * Add removed
     *
     * @param \AppBundle\Entity\FriendsRemoved $removed
     * @return Friends
     */
    public function addRemoved(\AppBundle\Entity\FriendsRemoved $removed)
    {
        $this->removed[] = $removed;

        return $this;
    }

    /**
     * Remove removed
     *
     * @param \AppBundle\Entity\FriendsRemoved $removed
     */
    public function removeRemoved(\AppBundle\Entity\FriendsRemoved $removed)
    {
        $this->removed->removeElement($removed);
    }

    /**
     * Get removed
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRemoved()
    {
        return $this->removed;
    }
}
