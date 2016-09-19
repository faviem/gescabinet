<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PersonnePhysique
 */
abstract  class PersonnePhysique
{
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Ville")
    * @ORM\JoinColumn(nullable=true) 
    */
   protected $ville;
    
    protected $id;
   
   /**
     * @var string
     *
     * @ORM\Column(name="telmobile", type="string", length=50, nullable=true)
     */
    protected $telmobile;
   /**
     * @var string
     *
     * @ORM\Column(name="telfixe", type="string", length=50, nullable=true)
     */
    protected $telfixe;
   /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=50, nullable=true)
     */
    protected $fax;
   /**
     * @var string
     *
     * @ORM\Column(name="bp", type="string", length=50, nullable=true)
     */
    protected $bp;
   /**
     * @var string
     *
     * @ORM\Column(name="adresserue", type="string", length=155, nullable=true)
     */
    protected $adresserue;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=true)
     */
    protected $email;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=155, nullable=true)
     */
    protected $prenom;

     /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=1, nullable=true)
     * @Assert\Regex(pattern= "/M|F/")
     */
    protected $sexe;
    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return PersonnePhysique
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
     * Set prenom
     *
     * @param string $prenom
     * @return PersonnePhysique
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
     * Set sexe
     *
     * @param string $sexe
     * @return PersonnePhysique
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set telmobile
     *
     * @param string $telmobile
     * @return PersonnePhysique
     */
    public function setTelmobile($telmobile)
    {
        $this->telmobile = $telmobile;

        return $this;
    }

    /**
     * Get telmobile
     *
     * @return string 
     */
    public function getTelmobile()
    {
        return $this->telmobile;
    }
    /**
     * Set telfixe
     *
     * @param string $telfixe
     * @return PersonnePhysique
     */
    public function setTelfixe($telfixe)
    {
        $this->telfixe = $telfixe;

        return $this;
    }

    /**
     * Get telfixe
     *
     * @return string 
     */
    public function getTelfixe()
    {
        return $this->telfixe;
    }
    /**
     * Set fax
     *
     * @param string $fax
     * @return PersonnePhysique
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }
    /**
     * Set bp
     *
     * @param string $bp
     * @return PersonnePhysique
     */
    public function setBp($bp)
    {
        $this->bp = $bp;

        return $this;
    }

    /**
     * Get bp
     *
     * @return string 
     */
    public function getBp()
    {
        return $this->bp;
    }
    /**
     * Set adresserue
     *
     * @param string $adresserue
     * @return PersonnePhysique
     */
    public function setAdresserue($adresserue)
    {
        $this->adresserue = $adresserue;

        return $this;
    }

    /**
     * Get adresserue
     *
     * @return string 
     */
    public function getAdresserue()
    {
        return $this->adresserue;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return PersonnePhysique
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

     public function getNomprenom()
    {
        return $this->getNom().'  '.$this->getPrenom();
    }
    
}
