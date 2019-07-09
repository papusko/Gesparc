<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Dentistes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomComplet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cabinet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BonCommandes", mappedBy="dentiste")
     */
    private $bonCommandes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bonCommandes = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Dentistes
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Dentistes
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Dentistes
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cabinet
     *
     * @param string $cabinet
     *
     * @return Dentistes
     */
    public function setCabinet($cabinet)
    {
        $this->cabinet = $cabinet;

        return $this;
    }

    /**
     * Get cabinet
     *
     * @return string
     */
    public function getCabinet()
    {
        return $this->cabinet;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Dentistes
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Add bonCommande
     *
     * @param \AppBundle\Entity\BonCommandes $bonCommande
     *
     * @return Dentistes
     */
    public function addBonCommande(\AppBundle\Entity\BonCommandes $bonCommande)
    {
        $this->bonCommandes[] = $bonCommande;

        return $this;
    }

    /**
     * Remove bonCommande
     *
     * @param \AppBundle\Entity\BonCommandes $bonCommande
     */
    public function removeBonCommande(\AppBundle\Entity\BonCommandes $bonCommande)
    {
        $this->bonCommandes->removeElement($bonCommande);
    }

    /**
     * Get bonCommandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBonCommandes()
    {
        return $this->bonCommandes;
    }

    /**
     * Set nomComplet
     *
     * @param string $nomComplet
     *
     * @return Dentistes
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * Get nomComplet
     *
     * @return string
     */
    public function getNomComplet()
    {
        return $this->nomComplet;
    }
}
