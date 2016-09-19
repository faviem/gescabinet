<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* BZ\ModelBundle\Entity\ReglementAffaire
*
* @ORM\Table(name="reglementaffaire")
* @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\ReglementAffaireRepository")
* @ORM\HasLifecycleCallbacks()
*/
class ReglementAffaire
{
     /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\PieceReglement", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $piecereglement;
     /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Exercice")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $exercice;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\ModeReglement")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $modereglement;
    
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Affaire", inversedBy="reglementaffaires")
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
     *  @ORM\Column(name="montantregelement", type="integer", nullable=true)
     * 
     */
    private $montantregelement;
    
    /**
     * @var integer
     * 
     *  @ORM\Column(name="montantrestant", type="integer", nullable=true)
     * 
     */
    private $montantrestant;

      /**
     * @var \DateTime
     *
     * @ORM\Column(name="datereglement", type="datetime", nullable=true)
     */
    private $datereglement;
    
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
     * @return ReglementAffaire
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
     * @return ReglementAffaire
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
     * @return ReglementAffaire
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
     * @return ReglementAffaire
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
     * @return ReglementAffaire
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
     * Set montantregelement
     *
     * @param integer $montantregelement
     * @return ReglementAffaire
     */
    public function setMontantregelement($montantregelement)
    {
        $this->montantregelement = $montantregelement;

        return $this;
    }

    /**
     * Get montantregelement
     *
     * @return integer 
     */
    public function getMontantregelement()
    {
        return $this->montantregelement;
    }

    /**
     * Set montantrestant
     *
     * @param \integer $montantrestant
     * @return ReglementAffaire
     */
    public function setMontantrestant($montantrestant)
    {
        $this->montantrestant = $montantrestant;

        return $this;
               //     $em = $this->getDoctrine()->getManager();
    }

    /**
     * Get montantrestant
     *
     * @return \integer 
     */
    public function getMontantrestant()
    {
        return $this->montantrestant;
    }

    /**
     * Set datereglement
     *
     * @param \DateTime $datereglement
     * @return ReglementAffaire
     */
    public function setDatereglement($datereglement)
    {
        $this->datereglement = $datereglement;

        return $this;
    }

    /**
     * Get datereglement
     *
     * @return \DateTime 
     */
    public function getDatereglement()
    {
        return $this->datereglement;
    }

    /**
     * Set exercice
     *
     * @param \BZ\ModelBundle\Entity\Exercice $exercice
     * @return ReglementAffaire
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
     * Set modereglement
     *
     * @param \BZ\ModelBundle\Entity\ModeReglement $modereglement
     * @return ReglementAffaire
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
     * @return ReglementAffaire
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
   
    /**
     * Set piecereglement
     *
     * @param \BZ\ModelBundle\Entity\PieceReglement $piecereglement
     * @return ReglementAffaire
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
}
