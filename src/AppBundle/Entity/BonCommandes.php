<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class BonCommandes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dentistes", inversedBy="bonCommandes")
     */
    private $dentiste;


        /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation_2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite_2;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation_3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite_3;



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation_4;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite_4;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $essayage;


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
     * Set creationAt
     *
     * @param \DateTime $creationAt
     *
     * @return BonCommandes
     */
    public function setCreationAt($creationAt)
    {
        $this->creation_at = $creationAt;

        return $this;
    }

    /**
     * Get creationAt
     *
     * @return \DateTime
     */
    public function getCreationAt()
    {
        return $this->creation_at;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return BonCommandes
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return BonCommandes
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set designation2
     *
     * @param string $designation2
     *
     * @return BonCommandes
     */
    public function setDesignation2($designation2)
    {
        $this->designation_2 = $designation2;

        return $this;
    }

    /**
     * Get designation2
     *
     * @return string
     */
    public function getDesignation2()
    {
        return $this->designation_2;
    }

    /**
     * Set quantite2
     *
     * @param integer $quantite2
     *
     * @return BonCommandes
     */
    public function setQuantite2($quantite2)
    {
        $this->quantite_2 = $quantite2;

        return $this;
    }

    /**
     * Get quantite2
     *
     * @return integer
     */
    public function getQuantite2()
    {
        return $this->quantite_2;
    }

    /**
     * Set designation3
     *
     * @param string $designation3
     *
     * @return BonCommandes
     */
    public function setDesignation3($designation3)
    {
        $this->designation_3 = $designation3;

        return $this;
    }

    /**
     * Get designation3
     *
     * @return string
     */
    public function getDesignation3()
    {
        return $this->designation_3;
    }

    /**
     * Set quantite3
     *
     * @param integer $quantite3
     *
     * @return BonCommandes
     */
    public function setQuantite3($quantite3)
    {
        $this->quantite_3 = $quantite3;

        return $this;
    }

    /**
     * Get quantite3
     *
     * @return integer
     */
    public function getQuantite3()
    {
        return $this->quantite_3;
    }

    /**
     * Set designation4
     *
     * @param string $designation4
     *
     * @return BonCommandes
     */
    public function setDesignation4($designation4)
    {
        $this->designation_4 = $designation4;

        return $this;
    }

    /**
     * Get designation4
     *
     * @return string
     */
    public function getDesignation4()
    {
        return $this->designation_4;
    }

    /**
     * Set quantite4
     *
     * @param integer $quantite4
     *
     * @return BonCommandes
     */
    public function setQuantite4($quantite4)
    {
        $this->quantite_4 = $quantite4;

        return $this;
    }

    /**
     * Get quantite4
     *
     * @return integer
     */
    public function getQuantite4()
    {
        return $this->quantite_4;
    }

    /**
     * Set essayage
     *
     * @param \DateTime $essayage
     *
     * @return BonCommandes
     */
    public function setEssayage($essayage)
    {
        $this->essayage = $essayage;

        return $this;
    }

    /**
     * Get essayage
     *
     * @return \DateTime
     */
    public function getEssayage()
    {
        return $this->essayage;
    }

    /**
     * Set dentiste
     *
     * @param \AppBundle\Entity\Dentistes $dentiste
     *
     * @return BonCommandes
     */
    public function setDentiste(\AppBundle\Entity\Dentistes $dentiste = null)
    {
        $this->dentiste = $dentiste;

        return $this;
    }

    /**
     * Get dentiste
     *
     * @return \AppBundle\Entity\Dentistes
     */
    public function getDentiste()
    {
        return $this->dentiste;
    }
}
