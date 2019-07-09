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
class Accessoires
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
	 protected $filtreAHuile;
	
	/**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $filtreAGasoil;		
	
	/**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $filtreAAir;	
	
	/**
	 * @ORM\Column(type="string" ,length=50)
     */
	 protected $filtreClim;
	
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
     * Set filtreAHuile
     *
     * @param string $filtreAHuile
     *
     * @return Accessoires
     */
    public function setFiltreAHuile($filtreAHuile)
    {
        $this->filtreAHuile = $filtreAHuile;

        return $this;
    }

    /**
     * Get filtreAHuile
     *
     * @return string
     */
    public function getFiltreAHuile()
    {
        return $this->filtreAHuile;
    }

    /**
     * Set filtreAGasoil
     *
     * @param string $filtreAGasoil
     *
     * @return Accessoires
     */
    public function setFiltreAGasoil($filtreAGasoil)
    {
        $this->filtreAGasoil = $filtreAGasoil;

        return $this;
    }

    /**
     * Get filtreAGasoil
     *
     * @return string
     */
    public function getFiltreAGasoil()
    {
        return $this->filtreAGasoil;
    }

    /**
     * Set filtreAAir
     *
     * @param string $filtreAAir
     *
     * @return Accessoires
     */
    public function setFiltreAAir($filtreAAir)
    {
        $this->filtreAAir = $filtreAAir;

        return $this;
    }

    /**
     * Get filtreAAir
     *
     * @return string
     */
    public function getFiltreAAir()
    {
        return $this->filtreAAir;
    }

    /**
     * Set filtreClim
     *
     * @param string $filtreClim
     *
     * @return Accessoires
     */
    public function setFiltreClim($filtreClim)
    {
        $this->filtreClim = $filtreClim;

        return $this;
    }

    /**
     * Get filtreClim
     *
     * @return string
     */
    public function getFiltreClim()
    {
        return $this->filtreClim;
    }

    /**
     * Set vehicules
     *
     * @param \AppBundle\Entity\Vehicules $vehicules
     *
     * @return Accessoires
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
