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
class Acquisition
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
	 protected $typeAcquision;
	 
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
     * Set typeAcquision
     *
     * @param string $typeAcquision
     *
     * @return Acquisition
     */
    public function setTypeAcquision($typeAcquision)
    {
        $this->typeAcquision = $typeAcquision;

        return $this;
    }

    /**
     * Get typeAcquision
     *
     * @return string
     */
    public function getTypeAcquision()
    {
        return $this->typeAcquision;
    }
}
