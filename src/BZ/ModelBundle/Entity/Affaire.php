<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* BZ\ModelBundle\Entity\Affaire
*
* @ORM\Table(name="affaire")
* @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\AffaireRepository")
* @ORM\HasLifecycleCallbacks()
*/
class Affaire
{
    /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\PieceAffaire", mappedBy="affaire")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $pieceaffaires;
    /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\ReglementAffaire", mappedBy="affaire")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $reglementaffaires;   
    /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\DepenseAffaire", mappedBy="affaire")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $depenseaffaires;   
    /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\TacheAffaire", mappedBy="affaire")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $tacheaffaires;
    /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\AvocatAdverse", mappedBy="affaire")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $avocatadverses;
    
    /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\AdversairePhysique", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $adversairephysique;
    /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\ClientPhysique", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $clientphysique;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Exercice")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $exercice;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\NatureAffaire")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $natureaffaire;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Juridiction")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $juridiction;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\QualiteAffaire")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $qualiteaffaire;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\ObjetLitige")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $objetlitige;
    
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
     *  @ORM\Column(name="coutaffaire", type="integer", nullable=true)
     * 
     */
    private $coutaffaire;
    
    /**
     * @var integer
     * 
     *  @ORM\Column(name="coutrestant", type="integer", nullable=true)
     * 
     */
    private $coutrestant;
    /**
     * @var integer
     * 
     *  @ORM\Column(name="coutprocedure", type="integer", nullable=true)
     * 
     */
    private $coutouverture;
    /**
     * @var integer
     * 
     *  @ORM\Column(name="coutouverture", type="integer", nullable=true)
     * 
     */
    private $coutprocedure;
    /**
     * @var integer
     * 
     *  @ORM\Column(name="couthonoraire", type="integer", nullable=true)
     * 
     */
    private $couthonoraire;
    /**
     * @var integer
     * 
     *  @ORM\Column(name="coutdepense", type="integer", nullable=true)
     * 
     */
    private $coutdepense;
    
    /**
     * @var \Date
     *
     * @ORM\Column(name="dateaffaire", type="date", nullable=true)
     */
    private $dateaffaire;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecloturee", type="date", nullable=true)
     */
    private $datecloturee;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datearchivee", type="date", nullable=true)
     */
    private $datearchivee;
    
    /**
     * @var string
     * 
     *  @ORM\Column(name="numeroaffaire", type="string", length=80, nullable=true)
     * 
     */
    private $numeroaffaire;
    /**
     * @var string
     * 
     *  @ORM\Column(name="numerodossier", type="string", length=80, nullable=true)
     * 
     */
    private $numerodosier;
    
    /**
     * @var string
     * 
     *  @ORM\Column(name="appreciationclient", type="string", length=255, nullable=true)
     * 
     */
    private $appreciationclient;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="estarchivee", type="boolean", nullable=true)
     */
    private $estarchivee;
    /**
     * @var boolean
     * 
     * @ORM\Column(name="estreglee", type="boolean", nullable=true)
     */
    private $estreglee;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="estnouveau", type="boolean", nullable=true)
     */
    private $estnouveau;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="estentraitement", type="boolean", nullable=true)
     */
    private $estentraitement;

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
     * @return Affaire
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
     * @return Affaire
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
     * @return Affaire
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
     * @return Affaire
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
     * @return Affaire
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
     * Set dateaffaire
     *
     * @param \DateTime $dateaffaire
     * @return Affaire
     */
    public function setDateaffaire($dateaffaire)
    {
        $this->dateaffaire = $dateaffaire;

        return $this;
    }

    /**
     * Get dateaffaire
     *
     * @return \DateTime 
     */
    public function getDateaffaire()
    {
        return $this->dateaffaire;
    }

    /**
     * Set appreciationclient
     *
     * @param string $appreciationclient
     * @return Affaire
     */
    public function setAppreciationclient($appreciationclient)
    {
        $this->appreciationclient = $appreciationclient;

        return $this;
    }

    /**
     * Get appreciationclient
     *
     * @return string 
     */
    public function getAppreciationclient()
    {
        return $this->appreciationclient;
    }

    /**
     * Set estarchivee
     *
     * @param boolean $estarchivee
     * @return Affaire
     */
    public function setEstarchivee($estarchivee)
    {
        $this->estarchivee = $estarchivee;

        return $this;
    }

    /**
     * Get estarchivee
     *
     * @return boolean 
     */
    public function getEstarchivee()
    {
        return $this->estarchivee;
    }

    /**
     * Set coutaffaire
     *
     * @param integer $coutaffaire
     * @return Affaire
     */
    public function setCoutaffaire($coutaffaire)
    {
        $this->coutaffaire = $coutaffaire;

        return $this;
    }

    /**
     * Get coutaffaire
     *
     * @return integer 
     */
    public function getCoutaffaire()
    {
        return $this->coutaffaire;
    }

    /**
     * Set coutrestant
     *
     * @param integer $coutrestant
     * @return Affaire
     */
    public function setCoutrestant($coutrestant)
    {
        $this->coutrestant = $coutrestant;

        return $this;
    }

    /**
     * Get coutrestant
     *
     * @return integer 
     */
    public function getCoutrestant()
    {
        return $this->coutrestant;
    }

    /**
     * Set datecloturee
     *
     * @param \DateTime $datecloturee
     * @return Affaire
     */
    public function setDatecloturee($datecloturee)
    {
        $this->datecloturee = $datecloturee;

        return $this;
    }

    /**
     * Get datecloturee
     *
     * @return \DateTime 
     */
    public function getDatecloturee()
    {
        return $this->datecloturee;
    }

    /**
     * Set datearchivee
     *
     * @param \DateTime $datearchivee
     * @return Affaire
     */
    public function setDatearchivee($datearchivee)
    {
        $this->datearchivee = $datearchivee;

        return $this;
    }

    /**
     * Get datearchivee
     *
     * @return \DateTime 
     */
    public function getDatearchivee()
    {
        return $this->datearchivee;
    }

    /**
     * Set numeroaffaire
     *
     * @param string $numeroaffaire
     * @return Affaire
     */
    public function setNumeroaffaire($numeroaffaire)
    {
        $this->numeroaffaire = $numeroaffaire;

        return $this;
    }

    /**
     * Get numeroaffaire
     *
     * @return string 
     */
    public function getNumeroaffaire()
    {
        return $this->numeroaffaire;
    }

    /**
     * Set adversairephysique
     *
     * @param \BZ\ModelBundle\Entity\AdversairePhysique $adversairephysique
     * @return Affaire
     */
    public function setAdversairephysique(\BZ\ModelBundle\Entity\AdversairePhysique $adversairephysique = null)
    {
        $this->adversairephysique = $adversairephysique;

        return $this;
    }

    /**
     * Get adversairephysique
     *
     * @return \BZ\ModelBundle\Entity\AdversairePhysique 
     */
    public function getAdversairephysique()
    {
        return $this->adversairephysique;
    }
    
    /**
     * Set clientphysique
     *
     * @param \BZ\ModelBundle\Entity\ClientPhysique $clientphysique
     * @return Affaire
     */
    public function setClientphysique(\BZ\ModelBundle\Entity\ClientPhysique $clientphysique = null)
    {
        $this->clientphysique = $clientphysique;

        return $this;
    }

    /**
     * Get clientphysique
     *
     * @return \BZ\ModelBundle\Entity\ClientPhysique 
     */
    public function getClientphysique()
    {
        return $this->clientphysique;
    }

    /**
     * Set exercice
     *
     * @param \BZ\ModelBundle\Entity\Exercice $exercice
     * @return Affaire
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
     * Set natureaffaire
     *
     * @param \BZ\ModelBundle\Entity\NatureAffaire $natureaffaire
     * @return Affaire
     */
    public function setNatureaffaire(\BZ\ModelBundle\Entity\NatureAffaire $natureaffaire = null)
    {
        $this->natureaffaire = $natureaffaire;

        return $this;
    }

    /**
     * Get natureaffaire
     *
     * @return \BZ\ModelBundle\Entity\NatureAffaire 
     */
    public function getNatureaffaire()
    {
        return $this->natureaffaire;
    }

    /**
     * Set juridiction
     *
     * @param \BZ\ModelBundle\Entity\Juridiction $juridiction
     * @return Affaire
     */
    public function setJuridiction(\BZ\ModelBundle\Entity\Juridiction $juridiction = null)
    {
        $this->juridiction = $juridiction;

        return $this;
    }

    /**
     * Get juridiction
     *
     * @return \BZ\ModelBundle\Entity\Juridiction 
     */
    public function getJuridiction()
    {
        return $this->juridiction;
    }

    /**
     * Set qualiteaffaire
     *
     * @param \BZ\ModelBundle\Entity\QualiteAffaire $qualiteaffaire
     * @return Affaire
     */
    public function setQualiteaffaire(\BZ\ModelBundle\Entity\QualiteAffaire $qualiteaffaire = null)
    {
        $this->qualiteaffaire = $qualiteaffaire;

        return $this;
    }

    /**
     * Get qualiteaffaire
     *
     * @return \BZ\ModelBundle\Entity\QualiteAffaire 
     */
    public function getQualiteaffaire()
    {
        return $this->qualiteaffaire;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pieceaffaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->avocatadverses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set estnouveau
     *
     * @param boolean $estnouveau
     * @return Affaire
     */
    public function setEstnouveau($estnouveau)
    {
        $this->estnouveau = $estnouveau;

        return $this;
    }

    /**
     * Get estnouveau
     *
     * @return boolean 
     */
    public function getEstnouveau()
    {
        return $this->estnouveau;
    }

    /**
     * Set estentraitement
     *
     * @param boolean $estentraitement
     * @return Affaire
     */
    public function setEstentraitement($estentraitement)
    {
        $this->estentraitement = $estentraitement;

        return $this;
    }

    /**
     * Get estentraitement
     *
     * @return boolean 
     */
    public function getEstentraitement()
    {
        return $this->estentraitement;
    }

    /**
     * Add pieceaffaires
     *
     * @param \BZ\ModelBundle\Entity\Affaire $pieceaffaires
     * @return Affaire
     */
    public function addPieceaffaire(\BZ\ModelBundle\Entity\Affaire $pieceaffaires)
    {
        $this->pieceaffaires[] = $pieceaffaires;

        return $this;
    }

    /**
     * Remove pieceaffaires
     *
     * @param \BZ\ModelBundle\Entity\Affaire $pieceaffaires
     */
    public function removePieceaffaire(\BZ\ModelBundle\Entity\Affaire $pieceaffaires)
    {
        $this->pieceaffaires->removeElement($pieceaffaires);
    }

    /**
     * Get pieceaffaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPieceaffaires()
    {
        return $this->pieceaffaires;
    }

    /**
     * Add avocatadverses
     *
     * @param \BZ\ModelBundle\Entity\AvocatAdverse $avocatadverses
     * @return Affaire
     */
    public function addAvocatadverse(\BZ\ModelBundle\Entity\AvocatAdverse $avocatadverses)
    {
        $this->avocatadverses[] = $avocatadverses;

        return $this;
    }

    /**
     * Remove avocatadverses
     *
     * @param \BZ\ModelBundle\Entity\AvocatAdverse $avocatadverses
     */
    public function removeAvocatadverse(\BZ\ModelBundle\Entity\AvocatAdverse $avocatadverses)
    {
        $this->avocatadverses->removeElement($avocatadverses);
    }

    /**
     * Get avocatadverses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAvocatadverses()
    {
        return $this->avocatadverses;
    }

    /**
     * Set estreglee
     *
     * @param boolean $estreglee
     * @return Affaire
     */
    public function setEstreglee($estreglee)
    {
        $this->estreglee = $estreglee;

        return $this;
    }

    /**
     * Get estreglee
     *
     * @return boolean 
     */
    public function getEstreglee()
    {
        return $this->estreglee;
    }
    
     /**
    * @ORM\PostPersist
    */
    public function updateDatecreate()
    {
        $this->setCoutaffaire($this->getCoutouverture()+$this->getCoutprocedure()+$this->getCouthonoraire());
        $this->setCoutrestant($this->getCoutouverture()+$this->getCoutprocedure()+$this->getCouthonoraire());
    }
    
    /**
     * Add reglementaffaires
     *
     * @param \BZ\ModelBundle\Entity\ReglementAffaire $reglementaffaires
     * @return Affaire
     */
    public function addReglementaffaire(\BZ\ModelBundle\Entity\ReglementAffaire $reglementaffaires)
    {
        $this->reglementaffaires[] = $reglementaffaires;

        return $this;
    }

    /**
     * Remove reglementaffaires
     *
     * @param \BZ\ModelBundle\Entity\ReglementAffaire $reglementaffaires
     */
    public function removeReglementaffaire(\BZ\ModelBundle\Entity\ReglementAffaire $reglementaffaires)
    {
        $this->reglementaffaires->removeElement($reglementaffaires);
    }

    /**
     * Get reglementaffaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReglementaffaires()
    {
        return $this->reglementaffaires;
    }

    /**
     * Add tacheaffaires
     *
     * @param \BZ\ModelBundle\Entity\TacheAffaire $tacheaffaires
     * @return Affaire
     */
    public function addTacheaffaire(\BZ\ModelBundle\Entity\TacheAffaire $tacheaffaires)
    {
        $this->tacheaffaires[] = $tacheaffaires;

        return $this;
    }

    /**
     * Remove tacheaffaires
     *
     * @param \BZ\ModelBundle\Entity\TacheAffaire $tacheaffaires
     */
    public function removeTacheaffaire(\BZ\ModelBundle\Entity\TacheAffaire $tacheaffaires)
    {
        $this->tacheaffaires->removeElement($tacheaffaires);
    }

    /**
     * Get tacheaffaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTacheaffaires()
    {
        return $this->tacheaffaires;
    }
    
    

    /**
     * Set numerodosier
     *
     * @param string $numerodosier
     * @return Affaire
     */
    public function setNumerodosier($numerodosier)
    {
        $this->numerodosier = $numerodosier;

        return $this;
    }

    /**
     * Get numerodosier
     *
     * @return string 
     */
    public function getNumerodosier()
    {
        return $this->numerodosier;
    }

    /**
     * Set coutouverture
     *
     * @param integer $coutouverture
     * @return Affaire
     */
    public function setCoutouverture($coutouverture)
    {
        $this->coutouverture = $coutouverture;

        return $this;
    }

    /**
     * Get coutouverture
     *
     * @return integer 
     */
    public function getCoutouverture()
    {
        return $this->coutouverture;
    }

    /**
     * Set coutprocedure
     *
     * @param integer $coutprocedure
     * @return Affaire
     */
    public function setCoutprocedure($coutprocedure)
    {
        $this->coutprocedure = $coutprocedure;

        return $this;
    }

    /**
     * Get coutprocedure
     *
     * @return integer 
     */
    public function getCoutprocedure()
    {
        return $this->coutprocedure;
    }

    /**
     * Set couthonoraire
     *
     * @param integer $couthonoraire
     * @return Affaire
     */
    public function setCouthonoraire($couthonoraire)
    {
        $this->couthonoraire = $couthonoraire;

        return $this;
    }

    /**
     * Get couthonoraire
     *
     * @return integer 
     */
    public function getCouthonoraire()
    {
        return $this->couthonoraire;
    }
       

    /**
     * Set objetlitige
     *
     * @param \BZ\ModelBundle\Entity\ObjetLitige $objetlitige
     * @return Affaire
     */
    public function setObjetlitige(\BZ\ModelBundle\Entity\ObjetLitige $objetlitige = null)
    {
        $this->objetlitige = $objetlitige;

        return $this;
    }

    /**
     * Get objetlitige
     *
     * @return \BZ\ModelBundle\Entity\ObjetLitige 
     */
    public function getObjetlitige()
    {
        return $this->objetlitige;
    }

    /**
     * Set coutdepense
     *
     * @param integer $coutdepense
     * @return Affaire
     */
    public function setCoutdepense($coutdepense)
    {
        $this->coutdepense = $coutdepense;

        return $this;
    }

    /**
     * Get coutdepense
     *
     * @return integer 
     */
    public function getCoutdepense()
    {
        return $this->coutdepense;
    }

    /**
     * Add depenseaffaires
     *
     * @param \BZ\ModelBundle\Entity\DepenseAffaire $depenseaffaires
     * @return Affaire
     */
    public function addDepenseaffaire(\BZ\ModelBundle\Entity\DepenseAffaire $depenseaffaires)
    {
        $this->depenseaffaires[] = $depenseaffaires;

        return $this;
    }

    /**
     * Remove depenseaffaires
     *
     * @param \BZ\ModelBundle\Entity\DepenseAffaire $depenseaffaires
     */
    public function removeDepenseaffaire(\BZ\ModelBundle\Entity\DepenseAffaire $depenseaffaires)
    {
        $this->depenseaffaires->removeElement($depenseaffaires);
    }

    /**
     * Get depenseaffaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDepenseaffaires()
    {
        return $this->depenseaffaires;
    }
}
