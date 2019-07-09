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
class Equipements
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
    protected $dateDePeremption;
	
	
	/**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $nomEquipement;	
	

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
     * Set dateDePeremption
     *
     * @param \DateTime $dateDePeremption
     *
     * @return Equipements
     */
    public function setDateDePeremption($dateDePeremption)
    {
        $this->dateDePeremption = $dateDePeremption;

        return $this;
    }

    /**
     * Get dateDePeremption
     *
     * @return \DateTime
     */
    public function getDateDePeremption()
    {
        return $this->dateDePeremption;
    }

    /**
     * Set nomEquipement
     *
     * @param string $nomEquipement
     *
     * @return Equipements
     */
    public function setNomEquipement($nomEquipement)
    {
        $this->nomEquipement = $nomEquipement;

        return $this;
    }

    /**
     * Get nomEquipement
     *
     * @return string
     */
    public function getNomEquipement()
    {
        return $this->nomEquipement;
    }
}
