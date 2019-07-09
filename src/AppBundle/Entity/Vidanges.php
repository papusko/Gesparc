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
class Vidanges
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
    protected $dateDeVidange;
	
	
	/**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $KiloDebut;	
	
	/**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $KiloFin;
	
	 /**
	 *@var vehicule
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
     * Set dateDeVidange
     *
     * @param \DateTime $dateDeVidange
     *
     * @return Vidanges
     */
    public function setDateDeVidange($dateDeVidange)
    {
        $this->dateDeVidange = $dateDeVidange;

        return $this;
    }

    /**
     * Get dateDeVidange
     *
     * @return \DateTime
     */
    public function getDateDeVidange()
    {
        return $this->dateDeVidange;
    }

    /**
     * Set kiloDebut
     *
     * @param string $kiloDebut
     *
     * @return Vidanges
     */
    public function setKiloDebut($kiloDebut)
    {
        $this->KiloDebut = $kiloDebut;

        return $this;
    }

    /**
     * Get kiloDebut
     *
     * @return string
     */
    public function getKiloDebut()
    {
        return $this->KiloDebut;
    }

    /**
     * Set kiloFin
     *
     * @param string $kiloFin
     *
     * @return Vidanges
     */
    public function setKiloFin($kiloFin)
    {
        $this->KiloFin = $kiloFin;

        return $this;
    }

    /**
     * Get kiloFin
     *
     * @return string
     */
    public function getKiloFin()
    {
        return $this->KiloFin;
    }

    /**
     * Set vehicules
     *
     * @param \AppBundle\Entity\Vehicules $vehicules
     *
     * @return Vidanges
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
