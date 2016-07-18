<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* BZ\ModelBundle\Entity\TacheAudience
*
* @ORM\Table(name="tacheaudience")
* @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\TacheAudienceRepository")
* @ORM\HasLifecycleCallbacks()
*/
class TacheAudience
{
    /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\PieceAudience", mappedBy="tacheaudience")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $pieceaudiences;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\TacheAffaire", inversedBy="tacheaudiences")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $tacheaffaire;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Agent")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $agentenregistree;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Agent")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $agentdestinataire;
   /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnregistree", type="datetime", nullable=true)
     */
    private $dateEnregistree;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="estvue", type="boolean", nullable=true)
     */
    private $estvue;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datevue", type="datetime", nullable=true)
     */
    private $datevue;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="estparticipee", type="boolean", nullable=true)
     */
    private $estparticipee;
    
     /**
     * @var \Date
     *
     * @ORM\Column(name="dateparticipee", type="date", nullable=true)
     */
    private $dateparticipee;
    
     /**
     * @var boolean
     * 
     * @ORM\Column(name="estresolue", type="boolean", nullable=true)
     */
    private $estresolue;
    
     /**
     * @var string
     * 
     *  @ORM\Column(name="notedestinataire", type="string", length=255, nullable=true)
     * 
     */
    private $notedestinataire;
     /**
     * @var string
     * 
     *  @ORM\Column(name="motif", type="string", length=255, nullable=true)
     * 
     */
    private $motif;
     /**
     * @var string
     * 
     *  @ORM\Column(name="observation", type="string", length=255, nullable=true)
     * 
     */
    private $observation;
     /**
     * @var string
     * 
     *  @ORM\Column(name="conclusion", type="string", length=255, nullable=true)
     * 
     */
    private $conclusion;
    
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
     * Set note
     *
     * @param string $note
     * @return TacheAudience
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return TacheAudience
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
     * @return TacheAudience
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
     * @return TacheAudience
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
     * @return TacheAudience
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
     * @return TacheAudience
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
     * Set dateEnregistree
     *
     * @param \DateTime $dateEnregistree
     * @return TacheAudience
     */
    public function setDateEnregistree($dateEnregistree)
    {
        $this->dateEnregistree = $dateEnregistree;

        return $this;
    }

    /**
     * Get dateEnregistree
     *
     * @return \DateTime 
     */
    public function getDateEnregistree()
    {
        return $this->dateEnregistree;
    }

    /**
     * Set estvue
     *
     * @param boolean $estvue
     * @return TacheAudience
     */
    public function setEstvue($estvue)
    {
        $this->estvue = $estvue;

        return $this;
    }

    /**
     * Get estvue
     *
     * @return boolean 
     */
    public function getEstvue()
    {
        return $this->estvue;
    }

    /**
     * Set datevue
     *
     * @param \DateTime $datevue
     * @return TacheAudience
     */
    public function setDatevue($datevue)
    {
        $this->datevue = $datevue;

        return $this;
    }

    /**
     * Get datevue
     *
     * @return \DateTime 
     */
    public function getDatevue()
    {
        return $this->datevue;
    }

    /**
     * Set estparticipee
     *
     * @param boolean $estparticipee
     * @return TacheAudience
     */
    public function setEstparticipee($estparticipee)
    {
        $this->estparticipee = $estparticipee;

        return $this;
    }

    /**
     * Get estparticipee
     *
     * @return boolean 
     */
    public function getEstparticipee()
    {
        return $this->estparticipee;
    }

    /**
     * Set dateparticipee
     *
     * @param \DateTime $dateparticipee
     * @return TacheAudience
     */
    public function setDateparticipee($dateparticipee)
    {
        $this->dateparticipee = $dateparticipee;

        return $this;
    }

    /**
     * Get dateparticipee
     *
     * @return \DateTime 
     */
    public function getDateparticipee()
    {
        return $this->dateparticipee;
    }

    /**
     * Set estresolue
     *
     * @param boolean $estresolue
     * @return TacheAudience
     */
    public function setEstresolue($estresolue)
    {
        $this->estresolue = $estresolue;

        return $this;
    }

    /**
     * Get estresolue
     *
     * @return boolean 
     */
    public function getEstresolue()
    {
        return $this->estresolue;
    }

    /**
     * Set notedestinataire
     *
     * @param string $notedestinataire
     * @return TacheAudience
     */
    public function setNotedestinataire($notedestinataire)
    {
        $this->notedestinataire = $notedestinataire;

        return $this;
    }

    /**
     * Get notedestinataire
     *
     * @return string 
     */
    public function getNotedestinataire()
    {
        return $this->notedestinataire;
    }

    /**
     * Set agentenregistree
     *
     * @param \BZ\ModelBundle\Entity\Agent $agentenregistree
     * @return TacheAudience
     */
    public function setAgentenregistree(\BZ\ModelBundle\Entity\Agent $agentenregistree = null)
    {
        $this->agentenregistree = $agentenregistree;

        return $this;
    }

    /**
     * Get agentenregistree
     *
     * @return \BZ\ModelBundle\Entity\Agent 
     */
    public function getAgentenregistree()
    {
        return $this->agentenregistree;
    }

    /**
     * Set agentdestinataire
     *
     * @param \BZ\ModelBundle\Entity\Agent $agentdestinataire
     * @return TacheAudience
     */
    public function setAgentdestinataire(\BZ\ModelBundle\Entity\Agent $agentdestinataire = null)
    {
        $this->agentdestinataire = $agentdestinataire;

        return $this;
    }

    /**
     * Get agentdestinataire
     *
     * @return \BZ\ModelBundle\Entity\Agent 
     */
    public function getAgentdestinataire()
    {
        return $this->agentdestinataire;
    }

    /**
     * Set tacheaffaire
     *
     * @param \BZ\ModelBundle\Entity\TacheAffaire $tacheaffaire
     * @return TacheAudience
     */
    public function setTacheaffaire(\BZ\ModelBundle\Entity\TacheAffaire $tacheaffaire = null)
    {
        $this->tacheaffaire = $tacheaffaire;

        return $this;
    }

    /**
     * Get tacheaffaire
     *
     * @return \BZ\ModelBundle\Entity\TacheAffaire 
     */
    public function getTacheaffaire()
    {
        return $this->tacheaffaire;
    }

    /**
     * Set observation
     *
     * @param string $observation
     * @return TacheAudience
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string 
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set motif
     *
     * @param string $motif
     * @return TacheAudience
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string 
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set conclusion
     *
     * @param string $conclusion
     * @return TacheAudience
     */
    public function setConclusion($conclusion)
    {
        $this->conclusion = $conclusion;

        return $this;
    }

    /**
     * Get conclusion
     *
     * @return string 
     */
    public function getConclusion()
    {
        return $this->conclusion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pieceaudiences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pieceaudiences
     *
     * @param \BZ\ModelBundle\Entity\PieceAudience $pieceaudiences
     * @return TacheAudience
     */
    public function addPieceaudience(\BZ\ModelBundle\Entity\PieceAudience $pieceaudiences)
    {
        $this->pieceaudiences[] = $pieceaudiences;

        return $this;
    }

    /**
     * Remove pieceaudiences
     *
     * @param \BZ\ModelBundle\Entity\PieceAudience $pieceaudiences
     */
    public function removePieceaudience(\BZ\ModelBundle\Entity\PieceAudience $pieceaudiences)
    {
        $this->pieceaudiences->removeElement($pieceaudiences);
    }

    /**
     * Get pieceaudiences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPieceaudiences()
    {
        return $this->pieceaudiences;
    }
}
