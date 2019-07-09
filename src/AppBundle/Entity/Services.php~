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
class Services
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
	 protected $nomServices;
	 

	
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
     * Set nomServices
     *
     * @param string $nomServices
     *
     * @return Services
     */
    public function setNomServices($nomServices)
    {
        $this->nomServices = $nomServices;

        return $this;
    }

    /**
     * Get nomServices
     *
     * @return string
     */
    public function getNomServices()
    {
        return $this->nomServices;
    }
}
