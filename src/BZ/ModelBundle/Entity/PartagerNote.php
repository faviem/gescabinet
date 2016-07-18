<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartagerNote
 *
 * @ORM\Table(name="partagernote")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\PartagerNoteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class PartagerNote
{
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\NoteRedigee", inversedBy="partagernotes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $noteredigee;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
       /**
     * @var boolean
     * 
     * @ORM\Column(name="estarchivee", type="boolean", nullable=true)
     */
    private $estarchivee;
     /**
     * @var boolean
     * 
     * @ORM\Column(name="estpubliee", type="boolean", nullable=true)
     */
    private $estpubliee;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datearchivee", type="datetime", nullable=true)
     */
    private $datearchivee;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepubliee", type="datetime", nullable=true)
     */
    private $datepubliee;
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
     * @return PartagerNote
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
     * @return PartagerNote
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
     * @return PartagerNote
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
     * @return PartagerNote
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
     * @return PartagerNote
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
     * @return PartagerNote
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
     * Set agentexpediteur
     *
     * @param \BZ\ModelBundle\Entity\Agent $agentexpediteur
     * @return PartagerNote
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
     * @return PartagerNote
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
     * Set noteredigee
     *
     * @param \BZ\ModelBundle\Entity\NoteRedigee $noteredigee
     * @return PartagerNote
     */
    public function setNoteredigee(\BZ\ModelBundle\Entity\NoteRedigee $noteredigee = null)
    {
        $this->noteredigee = $noteredigee;

        return $this;
    }

    /**
     * Get noteredigee
     *
     * @return \BZ\ModelBundle\Entity\NoteRedigee 
     */
    public function getNoteredigee()
    {
        return $this->noteredigee;
    }

    /**
     * Set estarchivee
     *
     * @param boolean $estarchivee
     * @return PartagerNote
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
     * Set estpubliee
     *
     * @param boolean $estpubliee
     * @return PartagerNote
     */
    public function setEstpubliee($estpubliee)
    {
        $this->estpubliee = $estpubliee;

        return $this;
    }

    /**
     * Get estpubliee
     *
     * @return boolean 
     */
    public function getEstpubliee()
    {
        return $this->estpubliee;
    }

    /**
     * Set datearchivee
     *
     * @param \DateTime $datearchivee
     * @return PartagerNote
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
     * Set datepubliee
     *
     * @param \DateTime $datepubliee
     * @return PartagerNote
     */
    public function setDatepubliee($datepubliee)
    {
        $this->datepubliee = $datepubliee;

        return $this;
    }

    /**
     * Get datepubliee
     *
     * @return \DateTime 
     */
    public function getDatepubliee()
    {
        return $this->datepubliee;
    }
}
