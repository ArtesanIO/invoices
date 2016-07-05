<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blocks
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BlocksRepository")
 */
class Blocks
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
     * @ORM\Column(name="block", type="string", length=255)
     */
    private $block;

    /**
     * @ORM\ManyToOne(targetEntity="Currencys", inversedBy="blocks")
     * @ORM\JoinColumn(name="currency_id", referencedColumnName="id")
     */
    private $currencys;


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
}
