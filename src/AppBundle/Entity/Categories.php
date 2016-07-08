<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categories
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
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="Records", mappedBy="categories")
     */
    private $records;

    /**
     * @ORM\ManyToOne(targetEntity="Blocks", inversedBy="categories")
     * @ORM\JoinColumn(name="block_id", referencedColumnName="id")
     */
    private $blocks;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->records = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set category
     *
     * @param string $category
     * @return Categories
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add records
     *
     * @param \AppBundle\Entity\Records $records
     * @return Categories
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

    /**
     * Set blocks
     *
     * @param \AppBundle\Entity\Blocks $blocks
     * @return Categories
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
}
