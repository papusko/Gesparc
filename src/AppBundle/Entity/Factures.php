<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Factures
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
     * @ORM\Column(type="integer")
     */
    private $prix;

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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prix_2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation_3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite_3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prix_3;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation_4;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantite_4;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prix_4;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montantPayer;

    private $total;
    private $total_2;
    private $total_3;
    private $total_4;
    private $totalf;
    private $sommes;

    
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
     * @return Factures
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
     * @return Factures
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
     * @return Factures
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
     * Set prix
     *
     * @param integer $prix
     *
     * @return Factures
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set designation2
     *
     * @param string $designation2
     *
     * @return Factures
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
     * @return Factures
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
     * Set prix2
     *
     * @param integer $prix2
     *
     * @return Factures
     */
    public function setPrix2($prix2)
    {
        $this->prix_2 = $prix2;

        return $this;
    }

    /**
     * Get prix2
     *
     * @return integer
     */
    public function getPrix2()
    {
        return $this->prix_2;
    }

    /**
     * Set designation3
     *
     * @param string $designation3
     *
     * @return Factures
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
     * @return Factures
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
     * Set prix3
     *
     * @param integer $prix3
     *
     * @return Factures
     */
    public function setPrix3($prix3)
    {
        $this->prix_3 = $prix3;

        return $this;
    }

    /**
     * Get prix3
     *
     * @return integer
     */
    public function getPrix3()
    {
        return $this->prix_3;
    }

    /**
     * Set designation4
     *
     * @param string $designation4
     *
     * @return Factures
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
     * @return Factures
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
     * Set prix4
     *
     * @param integer $prix4
     *
     * @return Factures
     */
    public function setPrix4($prix4)
    {
        $this->prix_4 = $prix4;

        return $this;
    }

    /**
     * Get prix4
     *
     * @return integer
     */
    public function getPrix4()
    {
        return $this->prix_4;
    }

    /**
     * Set dentiste
     *
     * @param \AppBundle\Entity\Dentistes $dentiste
     *
     * @return Factures
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

/**
     * Get total
     *
     * @return integer
     */
    public function getTotal()
    {


        return $this->quantite*$this->prix;

    }

/**
     * Get total2
     *
     * @return integer
     */
    public function getTotal2()
    {
        if ($this->quantite_2!=null AND $this->prix_2!=null ) {
         return $this->quantite_2*$this->prix_2;
        } else
        {

         }   

        return $this->total_2;
    }

    /**
     * Get total3
     *
     * @return integer
     */

        public function getTotal3()
    {
                   if ($this->quantite_3!=null AND $this->prix_3!=null) {
                     return $this->quantite_3*$this->prix_3;
                    } else
                        {

                         }  

              return $this->total_3;
    }

/**
     * Get total4
     *
     * @return integer
     */
    public function getTotal4()
    {
                    if ($this->quantite_4!=null AND $this->prix_4!=null) {
                     return $this->quantite_4*$this->prix_4;
                        } else
                        {

                        }  
     
    }


    


     /**
     * Get sommes
     *
     * @return integer
     */ 
    public function getSommes()
    {
        
            return $this->total_4+$this->total_3+$this->total_2+$this->total; 
        
            
                        
    }



    /**
     * Set montantPayer
     *
     * @param integer $montantPayer
     *
     * @return Factures
     */
    public function setMontantPayer($montantPayer)
    {
        $this->montantPayer = $montantPayer;

        return $this;
    }

    /**
     * Get montantPayer
     *
     * @return integer
     */
    public function getMontantPayer()
    {
        return $this->montantPayer;
    }
}
