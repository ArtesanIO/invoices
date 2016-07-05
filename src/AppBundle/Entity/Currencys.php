<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currencys
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CurrencysRepository")
 */
class Currencys
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
     * @ORM\Column(name="currency", type="string", length=255)
     */
    private $currency;

    /**
     * @ORM\OneToMany(targetEntity="Blocks", mappedBy="currencys")
     */
    private $blocks;

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
     * Set currency
     *
     * @param string $currency
     * @return Currencys
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blocks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add blocks
     *
     * @param \AppBundle\Entity\Blocks $blocks
     * @return Currencys
     */
    public function addBlock(\AppBundle\Entity\Blocks $blocks)
    {
        $this->blocks[] = $blocks;

        return $this;
    }

    /**
     * Remove blocks
     *
     * @param \AppBundle\Entity\Blocks $blocks
     */
    public function removeBlock(\AppBundle\Entity\Blocks $blocks)
    {
        $this->blocks->removeElement($blocks);
    }

    /**
     * Get blocks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlocks()
    {
        return $this->blocks;
    }
}
