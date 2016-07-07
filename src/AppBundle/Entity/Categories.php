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
}
