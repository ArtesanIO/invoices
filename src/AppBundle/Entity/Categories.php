<?php

namespace AppBundle\Entity;

use AppBundle\Utils\Slug;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\ManyToOne(targetEntity="TypesRecord", inversedBy="categories")
     * @ORM\JoinColumn(name="type_record_id", referencedColumnName="id")
     */
    private $typesRecord;

    /**
     * @ORM\OneToMany(targetEntity="Concepts", mappedBy="categories", cascade={"persist"})
     */
    private $concepts;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->records = new \Doctrine\Common\Collections\ArrayCollection();
        $this->concepts = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set typesRecord
     *
     * @param \AppBundle\Entity\TypesRecord $typesRecord
     * @return Categories
     */
    public function setTypesRecord(\AppBundle\Entity\TypesRecord $typesRecord = null)
    {
        $this->typesRecord = $typesRecord;

        return $this;
    }

    /**
     * Get typesRecord
     *
     * @return \AppBundle\Entity\TypesRecord 
     */
    public function getTypesRecord()
    {
        return $this->typesRecord;
    }

    /**
     * Add concepts
     *
     * @param \AppBundle\Entity\Concepts $concepts
     * @return Categories
     */
    public function addConcept(\AppBundle\Entity\Concepts $concepts)
    {
        $concepts->setCategories($this);
        $this->concepts->add($concepts);
    }

    /**
     * Remove concepts
     *
     * @param \AppBundle\Entity\Concepts $concepts
     */
    public function removeConcept(\AppBundle\Entity\Concepts $concepts)
    {
        $this->concepts->removeElement($concepts);
    }

    /**
     * Get concepts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConcepts()
    {
        return $this->concepts;
    }

    /**
     * @ORM\PrePersist
     */
    public function setSlug()
    {
        $slug = new Slug();

        $this->slug = $slug->slug();

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
