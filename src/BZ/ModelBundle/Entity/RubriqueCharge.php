<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* BZ\ModelBundle\Entity\RubriqueCharge
*
* @ORM\Table(name="rubriquecharge")
* @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\RubriqueChargeRepository")
* @ORM\HasLifecycleCallbacks()
*/
class RubriqueCharge
{
     /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\ChargeCabinet", mappedBy="rubriquecharge")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $chargecabinets;
     /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\PrevisionCharge", mappedBy="rubriquecharge")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $previsioncharges;
   /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     *  @ORM\Column(name="code", type="string", length=10, nullable=true)
     * 
     */
    private $code;
    /**
     * @var string
     * 
     *  @ORM\Column(name="libelle", type="string", length=155, nullable=true)
     * 
     */
    private $libelle;

     /**
     * @var string
     *
     * @ORM\Column(name="loginpersist", type="string", length=255, nullable=true)
     */
    private $loginpersist;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepersist", type="datetime", nullable=true)
     */
    private $datepersist;
    /**
     * @var string
     *
     * @ORM\Column(name="logindelete", type="string", length=255, nullable=true)
     */
    private $logindelete;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedelete", type="datetime", nullable=true)
     */
    private $datedelete;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="estdelete", type="boolean", nullable=true)
     */
    private $estdelete;

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
     * Set libelle
     *
     * @param string $libelle
     * @return RubriqueCharge
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return RubriqueCharge
     */
    public function setLoginpersist($loginpersist)
    {
        $this->loginpersist = $loginpersist;

        return $this;
    }

    /**
     * Get loginpersist
     *
     * @return string 
     */
    public function getLoginpersist()
    {
        return $this->loginpersist;
    }

    /**
     * Set datepersist
     *
     * @param \DateTime $datepersist
     * @return RubriqueCharge
     */
    public function setDatepersist($datepersist)
    {
        $this->datepersist = $datepersist;

        return $this;
    }

    /**
     * Get datepersist
     *
     * @return \DateTime 
     */
    public function getDatepersist()
    {
        return $this->datepersist;
    }

    /**
     * Set logindelete
     *
     * @param string $logindelete
     * @return RubriqueCharge
     */
    public function setLogindelete($logindelete)
    {
        $this->logindelete = $logindelete;

        return $this;
    }

    /**
     * Get logindelete
     *
     * @return string 
     */
    public function getLogindelete()
    {
        return $this->logindelete;
    }

    /**
     * Set datedelete
     *
     * @param \DateTime $datedelete
     * @return RubriqueCharge
     */
    public function setDatedelete($datedelete)
    {
        $this->datedelete = $datedelete;

        return $this;
    }

    /**
     * Get datedelete
     *
     * @return \DateTime 
     */
    public function getDatedelete()
    {
        return $this->datedelete;
    }

    /**
     * Set estdelete
     *
     * @param boolean $estdelete
     * @return RubriqueCharge
     */
    public function setEstdelete($estdelete)
    {
        $this->estdelete = $estdelete;

        return $this;
    }

    /**
     * Get estdelete
     *
     * @return boolean 
     */
    public function getEstdelete()
    {
        return $this->estdelete;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return RubriqueCharge
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }
    
    public function getDesignation()
    {
        return $this->getCode().' -  '. $this->getLibelle();
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->chargecabinets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add chargecabinets
     *
     * @param \BZ\ModelBundle\Entity\ChargeCabinet $chargecabinets
     * @return RubriqueCharge
     */
    public function addChargecabinet(\BZ\ModelBundle\Entity\ChargeCabinet $chargecabinets)
    {
        $this->chargecabinets[] = $chargecabinets;

        return $this;
    }

    /**
     * Remove chargecabinets
     *
     * @param \BZ\ModelBundle\Entity\ChargeCabinet $chargecabinets
     */
    public function removeChargecabinet(\BZ\ModelBundle\Entity\ChargeCabinet $chargecabinets)
    {
        $this->chargecabinets->removeElement($chargecabinets);
    }

    /**
     * Get chargecabinets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChargecabinets()
    {
        return $this->chargecabinets;
    }

    /**
     * Add previsioncharges
     *
     * @param \BZ\ModelBundle\Entity\PrevisionCharge $previsioncharges
     * @return RubriqueCharge
     */
    public function addPrevisioncharge(\BZ\ModelBundle\Entity\PrevisionCharge $previsioncharges)
    {
        $this->previsioncharges[] = $previsioncharges;

        return $this;
    }

    /**
     * Remove previsioncharges
     *
     * @param \BZ\ModelBundle\Entity\PrevisionCharge $previsioncharges
     */
    public function removePrevisioncharge(\BZ\ModelBundle\Entity\PrevisionCharge $previsioncharges)
    {
        $this->previsioncharges->removeElement($previsioncharges);
    }

    /**
     * Get previsioncharges
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrevisioncharges()
    {
        return $this->previsioncharges;
    }
}
