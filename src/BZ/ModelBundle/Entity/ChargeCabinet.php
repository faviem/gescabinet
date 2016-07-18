<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* BZ\ModelBundle\Entity\ChargeCabinet
*
* @ORM\Table(name="chargecabinet")
* @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\ChargeCabinetRepository")
* @ORM\HasLifecycleCallbacks()
*/
class ChargeCabinet
{
   /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\RubriqueCharge", inversedBy="chargecabinets")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $rubriquecharge;
   /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\PieceCharge", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $piececharge;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Exercice")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $exercice;
    /**
     * @var \Date
     *
     * @ORM\Column(name="datecharge", type="date", nullable=true)
     */
    private $datecharge;
    
     /**
     * @var integer
     * 
     *  @ORM\Column(name="montantcharge", type="integer", nullable=true)
     * 
     */
    private $montantcharge;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="estprevue", type="boolean", nullable=true)
     */
    private $estprevue;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="estrealisee", type="boolean", nullable=true)
     */
    private $estrealisee;
    
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
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return ChargeCabinet
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
     * @return ChargeCabinet
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
     * @return ChargeCabinet
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
     * @return ChargeCabinet
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
     * @return ChargeCabinet
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
     * Set datecharge
     *
     * @param \DateTime $datecharge
     * @return ChargeCabinet
     */
    public function setDatecharge($datecharge)
    {
        $this->datecharge = $datecharge;

        return $this;
    }

    /**
     * Get datecharge
     *
     * @return \DateTime 
     */
    public function getDatecharge()
    {
        return $this->datecharge;
    }

    /**
     * Set montantcharge
     *
     * @param integer $montantcharge
     * @return ChargeCabinet
     */
    public function setMontantcharge($montantcharge)
    {
        $this->montantcharge = $montantcharge;

        return $this;
    }

    /**
     * Get montantcharge
     *
     * @return integer 
     */
    public function getMontantcharge()
    {
        return $this->montantcharge;
    }

    /**
     * Set estprevue
     *
     * @param boolean $estprevue
     * @return ChargeCabinet
     */
    public function setEstprevue($estprevue)
    {
        $this->estprevue = $estprevue;

        return $this;
    }

    /**
     * Get estprevue
     *
     * @return boolean 
     */
    public function getEstprevue()
    {
        return $this->estprevue;
    }

    /**
     * Set estrealisee
     *
     * @param boolean $estrealisee
     * @return ChargeCabinet
     */
    public function setEstrealisee($estrealisee)
    {
        $this->estrealisee = $estrealisee;

        return $this;
    }

    /**
     * Get estrealisee
     *
     * @return boolean 
     */
    public function getEstrealisee()
    {
        return $this->estrealisee;
    }

    /**
     * Set rubriquecharge
     *
     * @param \BZ\ModelBundle\Entity\RubriqueCharge $rubriquecharge
     * @return ChargeCabinet
     */
    public function setRubriquecharge(\BZ\ModelBundle\Entity\RubriqueCharge $rubriquecharge = null)
    {
        $this->rubriquecharge = $rubriquecharge;

        return $this;
    }

    /**
     * Get rubriquecharge
     *
     * @return \BZ\ModelBundle\Entity\RubriqueCharge 
     */
    public function getRubriquecharge()
    {
        return $this->rubriquecharge;
    }

    /**
     * Set exercice
     *
     * @param \BZ\ModelBundle\Entity\Exercice $exercice
     * @return ChargeCabinet
     */
    public function setExercice(\BZ\ModelBundle\Entity\Exercice $exercice = null)
    {
        $this->exercice = $exercice;

        return $this;
    }

    /**
     * Get exercice
     *
     * @return \BZ\ModelBundle\Entity\Exercice 
     */
    public function getExercice()
    {
        return $this->exercice;
    }

    /**
     * Set piececharge
     *
     * @param \BZ\ModelBundle\Entity\PieceCharge $piececharge
     * @return ChargeCabinet
     */
    public function setPiececharge(\BZ\ModelBundle\Entity\PieceCharge $piececharge = null)
    {
        $this->piececharge = $piececharge;

        return $this;
    }

    /**
     * Get piececharge
     *
     * @return \BZ\ModelBundle\Entity\PieceCharge 
     */
    public function getPiececharge()
    {
        return $this->piececharge;
    }
}
