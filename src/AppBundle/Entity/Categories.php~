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
class Categories
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
	 protected $typeCategorie;
	 
	
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
     * Set typeCategorie
     *
     * @param string $typeCategorie
     *
     * @return Categories
     */
    public function setTypeCategorie($typeCategorie)
    {
        $this->typeCategorie = $typeCategorie;

        return $this;
    }

    /**
     * Get typeCategorie
     *
     * @return string
     */
    public function getTypeCategorie()
    {
        return $this->typeCategorie;
    }
}
