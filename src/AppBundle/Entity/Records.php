<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Records
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
     * @ORM\Column(name="description", type="string", length=255)
     * @Assert\NotBlank(message="La descripción es importante para recordar la importancia del registro")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float")
     */
    private $value;

    /**
     * @var datetime $recordDate
     *
     * @ORM\Column(name="recordDate", type="datetime")
     */
    private $recordDate;

    /**
     * @ORM\ManyToOne(targetEntity="Blocks", inversedBy="records")
     * @ORM\JoinColumn(name="block_id", referencedColumnName="id")
     */
    private $blocks;

    /**
     * @ORM\ManyToOne(targetEntity="TypesRecord", inversedBy="records")
     * @ORM\JoinColumn(name="type_record_id", referencedColumnName="id")
     */
    private $typesRecord;

    /**
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="records")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $categories;

    public function __construct()
    {
            $this->recordDate = new \Datetime("now");
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
     * Set description
     *
     * @param string $description
     * @return Records
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set value
     *
     * @param float $value
     * @return Records
     */
    public function setValue($value)
    {
        $this->value = $value;

        if($this->getTypesRecord()->getId() == 2){
          $this->value = -1 * $this->value;
        }

        return $this;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set blocks
     *
     * @param \AppBundle\Entity\Blocks $blocks
     * @return Records
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
     * @return Records
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
     * Set categories
     *
     * @param \AppBundle\Entity\Categories $categories
     * @return Records
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
     * Set recordDate
     *
     * @param \DateTime $recordDate
     * @return Records
     */
    public function setRecordDate($recordDate)
    {
        $this->recordDate = $recordDate;

        return $this;
    }

    /**
     * Get recordDate
     *
     * @return \DateTime
     */
    public function getRecordDate()
    {
        return $this->recordDate;
    }
}
