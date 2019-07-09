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
class Permis
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
	 protected $typePermis;
	 
	 	    /**
     * @ORM\Column(type="date")
     */    
    protected $FinDeValidite;
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
     * Set typePermis
     *
     * @param string $typePermis
     *
     * @return Permis
     */
    public function setTypePermis($typePermis)
    {
        $this->typePermis = $typePermis;

        return $this;
    }

    /**
     * Get typePermis
     *
     * @return string
     */
    public function getTypePermis()
    {
        return $this->typePermis;
    }

    /**
     * Set finDeValidite
     *
     * @param string $finDeValidite
     *
     * @return Permis
     */
    public function setFinDeValidite($finDeValidite)
    {
        $this->FinDeValidite = $finDeValidite;

        return $this;
    }

    /**
     * Get finDeValidite
     *
     * @return string
     */
    public function getFinDeValidite()
    {
        return $this->FinDeValidite;
    }

    /**
     * Set conducteurs
     *
     * @param \AppBundle\Entity\Conducteurs $conducteurs
     *
     * @return Permis
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
