<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Blocks
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BlocksRepository")
 */
class Blocks
{
  use TimestampableEntity;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="block", type="string", length=255)
     */
    private $block;

    /**
     * @ORM\ManyToOne(targetEntity="Currencys", inversedBy="blocks")
     * @ORM\JoinColumn(name="currency_id", referencedColumnName="id")
     */
    private $currencys;

    /**
     * @ORM\OneToMany(targetEntity="Records", mappedBy="blocks")
     */
    private $records;

    /**
     * @ORM\OneToMany(targetEntity="Categories", mappedBy="blocks", cascade={"persist"})
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="blocks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $users;

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
     * Set block
     *
     * @param string $block
     * @return Blocks
     */
    public function setBlock($block)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * Get block
     *
     * @return string
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set currencyId
     *
     * @param integer $currencyId
     * @return Blocks
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    /**
     * Get currencyId
     *
     * @return integer
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * Set currencys
     *
     * @param \AppBundle\Entity\Currencys $currencys
     * @return Blocks
     */
    public function setCurrencys(\AppBundle\Entity\Currencys $currencys = null)
    {
        $this->currencys = $currencys;

        return $this;
    }

    /**
     * Get currencys
     *
     * @return \AppBundle\Entity\Currencys
     */
    public function getCurrencys()
    {
        return $this->currencys;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->records = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add records
     *
     * @param \AppBundle\Entity\Records $records
     * @return Blocks
     */
    public function addRecord(\AppBundle\Entity\Records $records)
    {
        $this->records[] = $records;

        return $this;
    }

    /**
     * Remove records
     *
     * @param \AppBundle\Entity\Records $records
     */
    public function removeRecord(\AppBundle\Entity\Records $records)
    {
        $this->records->removeElement($records);
    }

    /**
     * Get records
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRecords()
    {
        return $this->records;
    }

    public function getRecordsTotal()
    {
      $total = 0;

      foreach($this->getRecords() as $record){
        $total += $record->getValue();
      }

      return $total;
    }

    /**
     * Add categories
     *
     * @param \AppBundle\Entity\Categories $categories
     * @return Blocks
     */
    public function addCategory(\AppBundle\Entity\Categories $categories)
    {
        $categories->setBlocks($this);
        $this->categories->add($categories);
    }

    /**
     * Remove categories
     *
     * @param \AppBundle\Entity\Categories $categories
     */
    public function removeCategory(\AppBundle\Entity\Categories $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set users
     *
     * @param \AppBundle\Entity\User $users
     * @return Blocks
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
