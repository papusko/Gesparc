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
class Missions
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
	
	//lieu de la mission au lieu du type de message
	
	/**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $TypeMissions;

	/**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $ObjetMissions;	
	


	/**
     * @ORM\Column(type="date")
     */    
    protected $dateDebut;
	
		 	    /**
     * @ORM\Column(type="date")
     */    
    protected $dateFin;
	
	 /**
	 *@var vehicule
	 *Assert\Type(type="AppBundle\Entity\Vehicules")
	 *@Assert\Valid()
     * @ORM\ManyToOne(targetEntity="Vehicules", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */    
    protected $vehicules;
	
	
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
     * Set typeMissions
     *
     * @param string $typeMissions
     *
     * @return Missions
     */
    public function setTypeMissions($typeMissions)
    {
        $this->TypeMissions = $typeMissions;

        return $this;
    }

    /**
     * Get typeMissions
     *
     * @return string
     */
    public function getTypeMissions()
    {
        return $this->TypeMissions;
    }

    /**
     * Set objetMissions
     *
     * @param string $objetMissions
     *
     * @return Missions
     */
    public function setObjetMissions($objetMissions)
    {
        $this->ObjetMissions = $objetMissions;

        return $this;
    }

    /**
     * Get objetMissions
     *
     * @return string
     */
    public function getObjetMissions()
    {
        return $this->ObjetMissions;
    }

    /**
     * Set distance
     *
     * @param string $distance
     *
     * @return Missions
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return string
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Missions
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Missions
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set vehicules
     *
     * @param \AppBundle\Entity\Vehicules $vehicules
     *
     * @return Missions
     */
    public function setVehicules(\AppBundle\Entity\Vehicules $vehicules)
    {
        $this->vehicules = $vehicules;

        return $this;
    }

    /**
     * Get vehicules
     *
     * @return \AppBundle\Entity\Vehicules
     */
    public function getVehicules()
    {
        return $this->vehicules;
    }

    /**
     * Set conducteurs
     *
     * @param \AppBundle\Entity\Conducteurs $conducteurs
     *
     * @return Missions
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

    /**
     * Set categories
     *
     * @param \AppBundle\Entity\Conducteurs $categories
     *
     * @return Missions
     */
    public function setCategories(\AppBundle\Entity\Conducteurs $categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \AppBundle\Entity\Conducteurs
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
