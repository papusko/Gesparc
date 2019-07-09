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
class VisiteTechnique
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
	
	/**
	 * @ORM\Column(type="date")
     */
	 protected $dateDebut;
	 
	 	    /**
     * @ORM\Column(type="date")
     */    
    protected $dateFin;
	
		 		  /**
	 *@var vehicules
	 *Assert\Type(type="AppBundle\Entity\Vehicules")
	 *@Assert\Valid()
     * @ORM\ManyToOne(targetEntity="Vehicules", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */ 
	 protected $vehicules;
	
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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return VisiteTechnique
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
     * @return VisiteTechnique
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
     * @return VisiteTechnique
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
}
