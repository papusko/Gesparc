<?php
namespace AppBundle\Entity; 
use Doctrine\ORM\Mapping as ORM; 
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\common\Annotations\Annotations\Target;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity
 *
 */
class Vehicules
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
	
	/**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $immatriculation;
	 
	 	    /**
     * @ORM\Column(type="string", length=100)
     */    
    protected $numeroDeChassis;
	
	
    
/**
    * @ORM\Column(type="date")
     */
	 protected $dateMiseCirculation;
	 

	
	/**
     * @ORM\Column(type="string", length=50)
     */    
    protected $couleur;
	
	  	/**
     * @ORM\Column(type="string", length=50)
     */     
	 protected $marques;

	 /**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $etat;
	 
	 /**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $type;
	 
	 /**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $nombrePlace;
	 
			   /**
	 *@var categories
	 *Assert\Type(type="AppBundle\Entity\Categories ")
	 *@Assert\Valid()
     * @ORM\ManyToOne(targetEntity="Categories", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */    
	 protected $categories;	
	
		   /**
	 *@var acquisition
	 *Assert\Type(type="AppBundle\Entity\Acquisition ")
	 *@Assert\Valid()
     * @ORM\ManyToOne(targetEntity="Acquisition", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */    
    protected $acquisition;	

	 
	 		  /**
	 *@var conducteurs
	 *Assert\Type(type="AppBundle\Entity\Conducteurs")
	 *@Assert\Valid()
     * @ORM\ManyToOne(targetEntity="Conducteurs", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */ 
	 protected $conducteurs;
	
	
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
     * Set immatriculation
     *
     * @param string $immatriculation
     *
     * @return Vehicules
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * Get immatriculation
     *
     * @return string
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * Set numeroDeChassis
     *
     * @param string $numeroDeChassis
     *
     * @return Vehicules
     */
    public function setNumeroDeChassis($numeroDeChassis)
    {
        $this->numeroDeChassis = $numeroDeChassis;

        return $this;
    }

    /**
     * Get numeroDeChassis
     *
     * @return string
     */
    public function getNumeroDeChassis()
    {
        return $this->numeroDeChassis;
    }

    /**
     * Set dateMiseCirculation
     *
     * @param \DateTime $dateMiseCirculation
     *
     * @return Vehicules
     */
    public function setDateMiseCirculation($dateMiseCirculation)
    {
        $this->dateMiseCirculation = $dateMiseCirculation;

        return $this;
    }

    /**
     * Get dateMiseCirculation
     *
     * @return \DateTime
     */
    public function getDateMiseCirculation()
    {
        return $this->dateMiseCirculation;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Vehicules
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set marques
     *
     * @param string $marques
     *
     * @return Vehicules
     */
    public function setMarques($marques)
    {
        $this->marques = $marques;

        return $this;
    }

    /**
     * Get marques
     *
     * @return string
     */
    public function getMarques()
    {
        return $this->marques;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Vehicules
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Vehicules
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nombrePlace
     *
     * @param string $nombrePlace
     *
     * @return Vehicules
     */
    public function setNombrePlace($nombrePlace)
    {
        $this->nombrePlace = $nombrePlace;

        return $this;
    }

    /**
     * Get nombrePlace
     *
     * @return string
     */
    public function getNombrePlace()
    {
        return $this->nombrePlace;
    }

    /**
     * Set categories
     *
     * @param \AppBundle\Entity\Categories $categories
     *
     * @return Vehicules
     */
    public function setCategories(\AppBundle\Entity\Categories $categories)
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
     * Set acquisition
     *
     * @param \AppBundle\Entity\Acquisition $acquisition
     *
     * @return Vehicules
     */
    public function setAcquisition(\AppBundle\Entity\Acquisition $acquisition)
    {
        $this->acquisition = $acquisition;

        return $this;
    }

    /**
     * Get acquisition
     *
     * @return \AppBundle\Entity\Acquisition
     */
    public function getAcquisition()
    {
        return $this->acquisition;
    }

    /**
     * Set conducteurs
     *
     * @param \AppBundle\Entity\Conducteurs $conducteurs
     *
     * @return Vehicules
     */
    public function setConducteurs(\AppBundle\Entity\Conducteurs $conducteurs)
    {
        $this->conducteurs = $conducteurs;

        return $this;
    }

    /**
     * Get conducteurs
     *
     * @return \AppBundle\Entity\Conducteurs
     */
    public function getConducteurs()
    {
        return $this->conducteurs;
    }
}
