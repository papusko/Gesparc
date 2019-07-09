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
class Pannes
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
	 protected $dateDeclaration;
	 
			 		  /**
	 *@var conducteurs
	 *Assert\Type(type="AppBundle\Entity\Conducteurs")
	 *@Assert\Valid()
     * @ORM\ManyToOne(targetEntity="Conducteurs", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */ 
	 protected $conducteurs;
	
		 		  /**
	 *@var vehicules
	 *Assert\Type(type="AppBundle\Entity\Vehicules")
	 *@Assert\Valid()
     * @ORM\ManyToOne(targetEntity="Vehicules", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */ 
	 protected $vehicules;
	 
	 	/**
	 * @ORM\Column(type="string" ,length=255)
     */
	 protected $pannes;

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
     * Set dateDeclaration
     *
     * @param \DateTime $dateDeclaration
     *
     * @return Pannes
     */
    public function setDateDeclaration($dateDeclaration)
    {
        $this->dateDeclaration = $dateDeclaration;

        return $this;
    }

    /**
     * Get dateDeclaration
     *
     * @return \DateTime
     */
    public function getDateDeclaration()
    {
        return $this->dateDeclaration;
    }

    /**
     * Set pannes
     *
     * @param string $pannes
     *
     * @return Pannes
     */
    public function setPannes($pannes)
    {
        $this->pannes = $pannes;

        return $this;
    }

    /**
     * Get pannes
     *
     * @return string
     */
    public function getPannes()
    {
        return $this->pannes;
    }

    /**
     * Set conducteurs
     *
     * @param \AppBundle\Entity\Conducteurs $conducteurs
     *
     * @return Pannes
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
     * Set vehicules
     *
     * @param \AppBundle\Entity\Vehicules $vehicules
     *
     * @return Pannes
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
