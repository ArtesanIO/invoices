<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TiposRegistro
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RecordsType
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
     * @ORM\Column(name="recordType", type="string", length=255)
     */
    private $recordType;

    /**
     * @ORM\OneToMany(targetEntity="RecordsType", mappedBy="recordsType")
     */
    private $records;
}
