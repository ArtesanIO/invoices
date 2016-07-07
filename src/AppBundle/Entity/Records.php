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
     * @ORM\ManyToOne(targetEntity="Blocks", inversedBy="records")
     * @ORM\JoinColumn(name="block_id", referencedColumnName="id")
     */
    private $blocks;

    /**
     * @ORM\ManyToOne(targetEntity="RecordsType", inversedBy="records")
     * @ORM\JoinColumn(name="record_type_id", referencedColumnName="id")
     */
    private $recordsType;

    /**
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="records")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $categories;
}
