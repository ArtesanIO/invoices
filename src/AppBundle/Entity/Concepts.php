<?php

namespace AppBundle\Entity;

use AppBundle\Utils\Slug;
use Doctrine\ORM\Mapping as ORM;

/**
 * Concepts
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Concepts
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
    private $concept;

    /**
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="concepts")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $categories;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

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
     * Set concept
     *
     * @param string $concept
     * @return Concepts
     */
    public function setConcept($concept)
    {
        $this->concept = $concept;

        return $this;
    }

    /**
     * Get concept
     *
     * @return string 
     */
    public function getConcept()
    {
        return $this->concept;
    }

    /**
     * Set categories
     *
     * @param \AppBundle\Entity\Categories $categories
     * @return Concepts
     */
    public function setCategories(\AppBundle\Entity\Categories $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \AppBundle\Entity\Categories 
     */
    public function getCategories()
    {
        return $this->categories;
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
