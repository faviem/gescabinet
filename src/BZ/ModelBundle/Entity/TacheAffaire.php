<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* BZ\ModelBundle\Entity\TacheAffaire
*
* @ORM\Table(name="tacheaffaire")
* @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\TacheAffaireRepository")
* @ORM\HasLifecycleCallbacks()
*/
class TacheAffaire
{
     /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\TacheAudience", mappedBy="tacheaffaire")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $tacheaudiences;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Affaire", inversedBy="tacheaffaires")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $affaire;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Agent")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $agentexpediteur;
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
     * @var string
     * 
     *  @ORM\Column(name="note", type="string", length=255, nullable=true)
     * 
     */
    private $note;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateassignee", type="datetime", nullable=true)
     */
    private $dateassignee;
    
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
     * @return TacheAffaire
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
     * @return TacheAffaire
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
     * @return TacheAffaire
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
     * @return TacheAffaire
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
     * @return TacheAffaire
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
     * @return TacheAffaire
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
     * Set dateassignee
     *
     * @param \DateTime $dateassignee
     * @return TacheAffaire
     */
    public function setDateassignee($dateassignee)
    {
        $this->dateassignee = $dateassignee;

        return $this;
    }

    /**
     * Get dateassignee
     *
     * @return \DateTime 
     */
    public function getDateassignee()
    {
        return $this->dateassignee;
    }

    /**
     * Set estvue
     *
     * @param boolean $estvue
     * @return TacheAffaire
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
     * @return TacheAffaire
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
     * Set estresolue
     *
     * @param boolean $estresolue
     * @return TacheAffaire
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
     * @return TacheAffaire
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
     * Set affaire
     *
     * @param \BZ\ModelBundle\Entity\Affaire $affaire
     * @return TacheAffaire
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
     * Set agentexpediteur
     *
     * @param \BZ\ModelBundle\Entity\Agent $agentexpediteur
     * @return TacheAffaire
     */
    public function setAgentexpediteur(\BZ\ModelBundle\Entity\Agent $agentexpediteur = null)
    {
        $this->agentexpediteur = $agentexpediteur;

        return $this;
    }

    /**
     * Get agentexpediteur
     *
     * @return \BZ\ModelBundle\Entity\Agent 
     */
    public function getAgentexpediteur()
    {
        return $this->agentexpediteur;
    }

    /**
     * Set agentdestinataire
     *
     * @param \BZ\ModelBundle\Entity\Agent $agentdestinataire
     * @return TacheAffaire
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
     * Constructor
     */
    public function __construct()
    {
        $this->tacheaudiences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tacheaudiences
     *
     * @param \BZ\ModelBundle\Entity\TacheAudience $tacheaudiences
     * @return TacheAffaire
     */
    public function addTacheaudience(\BZ\ModelBundle\Entity\TacheAudience $tacheaudiences)
    {
        $this->tacheaudiences[] = $tacheaudiences;

        return $this;
    }

    /**
     * Remove tacheaudiences
     *
     * @param \BZ\ModelBundle\Entity\TacheAudience $tacheaudiences
     */
    public function removeTacheaudience(\BZ\ModelBundle\Entity\TacheAudience $tacheaudiences)
    {
        $this->tacheaudiences->removeElement($tacheaudiences);
    }

    /**
     * Get tacheaudiences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTacheaudiences()
    {
        return $this->tacheaudiences;
    }
}
