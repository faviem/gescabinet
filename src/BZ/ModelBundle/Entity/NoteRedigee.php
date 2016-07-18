<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NoteRedigee
 *
 * @ORM\Table(name="noteredigee")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\NoteRedigeeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class NoteRedigee
{
    /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\PartagerNote", mappedBy="noteredigee")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $partagernotes;
    /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\PieceNote", mappedBy="noteredigee")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $piecenotes;
     /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\CategorieNote")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $categorienote;
     /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Agent")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $agent;
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
     * @ORM\Column(name="note", type="string", length=255)
     */
    private $note;
    
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
     * @return NoteRedigee
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
     * @return NoteRedigee
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
     * @return NoteRedigee
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
     * @return NoteRedigee
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
     * @return NoteRedigee
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
     * @return NoteRedigee
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
     * Set estarchivee
     *
     * @param boolean $estarchivee
     * @return NoteRedigee
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
     * Set datearchivee
     *
     * @param \DateTime $datearchivee
     * @return NoteRedigee
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
     * Constructor
     */
    public function __construct()
    {
        $this->partagernotes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add partagernotes
     *
     * @param \BZ\ModelBundle\Entity\PartagerNote $partagernotes
     * @return NoteRedigee
     */
    public function addPartagernote(\BZ\ModelBundle\Entity\PartagerNote $partagernotes)
    {
        $this->partagernotes[] = $partagernotes;

        return $this;
    }

    /**
     * Remove partagernotes
     *
     * @param \BZ\ModelBundle\Entity\PartagerNote $partagernotes
     */
    public function removePartagernote(\BZ\ModelBundle\Entity\PartagerNote $partagernotes)
    {
        $this->partagernotes->removeElement($partagernotes);
    }

    /**
     * Get partagernotes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPartagernotes()
    {
        return $this->partagernotes;
    }

    /**
     * Set categorienote
     *
     * @param \BZ\ModelBundle\Entity\CategorieNote $categorienote
     * @return NoteRedigee
     */
    public function setCategorienote(\BZ\ModelBundle\Entity\CategorieNote $categorienote = null)
    {
        $this->categorienote = $categorienote;

        return $this;
    }

    /**
     * Get categorienote
     *
     * @return \BZ\ModelBundle\Entity\CategorieNote 
     */
    public function getCategorienote()
    {
        return $this->categorienote;
    }

    /**
     * Set estpubliee
     *
     * @param boolean $estpubliee
     * @return NoteRedigee
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
     * Set datepubliee
     *
     * @param \DateTime $datepubliee
     * @return NoteRedigee
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

    /**
     * Add piecenotes
     *
     * @param \BZ\ModelBundle\Entity\PieceNote $piecenotes
     * @return NoteRedigee
     */
    public function addPiecenote(\BZ\ModelBundle\Entity\PieceNote $piecenotes)
    {
        $this->piecenotes[] = $piecenotes;

        return $this;
    }

    /**
     * Remove piecenotes
     *
     * @param \BZ\ModelBundle\Entity\PieceNote $piecenotes
     */
    public function removePiecenote(\BZ\ModelBundle\Entity\PieceNote $piecenotes)
    {
        $this->piecenotes->removeElement($piecenotes);
    }

    /**
     * Get piecenotes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPiecenotes()
    {
        return $this->piecenotes;
    }

    /**
     * Set agent
     *
     * @param \BZ\ModelBundle\Entity\Agent $agent
     * @return NoteRedigee
     */
    public function setAgent(\BZ\ModelBundle\Entity\Agent $agent = null)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return \BZ\ModelBundle\Entity\Agent 
     */
    public function getAgent()
    {
        return $this->agent;
    }
}
