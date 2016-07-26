<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TiposRegistro
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TypesRecord
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
     * @ORM\Column(name="typeRecord", type="string", length=255)
     */
    private $typeRecord;

    /**
     * @ORM\OneToMany(targetEntity="Categories", mappedBy="typesRecord")
     */
    private $categories;

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
     * Set typeRecord
     *
     * @param string $typeRecord
     * @return TypesRecord
     */
    public function setTypeRecord($typeRecord)
    {
        $this->typeRecord = $typeRecord;

        return $this;
    }

    /**
     * Get typeRecord
     *
     * @return string
     */
    public function getTypeRecord()
    {
        return $this->typeRecord;
    }

    /**
     * Add categories
     *
     * @param \AppBundle\Entity\Categories $categories
     * @return TypesRecord
     */
    public function addCategory(\AppBundle\Entity\Categories $categories)
    {
        $this->categories[] = $categories;

        return $this;
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
}
