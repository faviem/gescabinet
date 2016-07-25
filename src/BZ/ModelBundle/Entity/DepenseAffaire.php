<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* BZ\ModelBundle\Entity\DepenseAffaire
*
* @ORM\Table(name="depenseaffaire")
* @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\DepenseAffaireRepository")
* @ORM\HasLifecycleCallbacks()
*/
class DepenseAffaire
{
     /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\PieceReglement", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $piecereglement;
     
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\ModeReglement")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $modereglement;
    
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Affaire", inversedBy="depenseaffaires")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $affaire;
   /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * 
     *  @ORM\Column(name="montantdepense", type="integer", nullable=true)
     * 
     */
    private $montantdepense;

      /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedepense", type="datetime", nullable=true)
     */
    private $datedepense;
    
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
     * @return DepenseAffaire
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
     * @return DepenseAffaire
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
     * @return DepenseAffaire
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
     * @return DepenseAffaire
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
     * @return DepenseAffaire
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
    * @ORM\PostPersist
    */
    public function updateDatecreate()
    {
       
          $this->getAffaire()->setCoutdepense($this->getAffaire()->getCoutdepense()+$this->getMontantdepense());
    }
   

    /**
     * Set montantdepense
     *
     * @param integer $montantdepense
     * @return DepenseAffaire
     */
    public function setMontantdepense($montantdepense)
    {
        $this->montantdepense = $montantdepense;

        return $this;
    }

    /**
     * Get montantdepense
     *
     * @return integer 
     */
    public function getMontantdepense()
    {
        return $this->montantdepense;
    }

    /**
     * Set datedepense
     *
     * @param \DateTime $datedepense
     * @return DepenseAffaire
     */
    public function setDatedepense($datedepense)
    {
        $this->datedepense = $datedepense;

        return $this;
    }

    /**
     * Get datedepense
     *
     * @return \DateTime 
     */
    public function getDatedepense()
    {
        return $this->datedepense;
    }

    /**
     * Set piecereglement
     *
     * @param \BZ\ModelBundle\Entity\PieceReglement $piecereglement
     * @return DepenseAffaire
     */
    public function setPiecereglement(\BZ\ModelBundle\Entity\PieceReglement $piecereglement = null)
    {
        $this->piecereglement = $piecereglement;

        return $this;
    }

    /**
     * Get piecereglement
     *
     * @return \BZ\ModelBundle\Entity\PieceReglement 
     */
    public function getPiecereglement()
    {
        return $this->piecereglement;
    }

    /**
     * Set modereglement
     *
     * @param \BZ\ModelBundle\Entity\ModeReglement $modereglement
     * @return DepenseAffaire
     */
    public function setModereglement(\BZ\ModelBundle\Entity\ModeReglement $modereglement = null)
    {
        $this->modereglement = $modereglement;

        return $this;
    }

    /**
     * Get modereglement
     *
     * @return \BZ\ModelBundle\Entity\ModeReglement 
     */
    public function getModereglement()
    {
        return $this->modereglement;
    }

    /**
     * Set affaire
     *
     * @param \BZ\ModelBundle\Entity\Affaire $affaire
     * @return DepenseAffaire
     */
    public function setAffaire(\BZ\ModelBundle\Entity\Affaire $affaire = null)
    {
        $this->affaire = $affaire;

        return $this;
    }

    /**
     * Get affaire
     *
     * @return \BZ\ModelBundle\Entity\Affaire 
     */
    public function getAffaire()
    {
        return $this->affaire;
    }
}
