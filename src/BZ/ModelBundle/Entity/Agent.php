<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BZ\ModelBundle\Entity\PersonnePhysique;
/**
 * Agent
 *
 * @ORM\Table(name="agent")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\AgentRepository")
 *  @ORM\HasLifecycleCallbacks()
 */
class Agent extends PersonnePhysique
{
    /**
    * @ORM\OneToOne(targetEntity="BZ\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $user;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
         /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=100, nullable=true)
     */
    private $fonction;
    
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
     * Set user
     *
     * @param \BZ\UserBundle\Entity\User $user
     * @return Agent
     */
    public function setUser(\BZ\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BZ\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return Agent
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
     * @return Agent
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
     * @return Agent
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
     * @return Agent
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
     * @return Agent
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
     * Set fonction
     *
     * @param string $fonction
     * @return Agent
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string 
     */
    public function getFonction()
    {
        return $this->fonction;
    }


    /**
     * Set ville
     *
     * @param \BZ\ModelBundle\Entity\Ville $ville
     * @return Agent
     */
    public function setVille(\BZ\ModelBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }
    
       /**
     * Get ville
     *
     * @return \BZ\ModelBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }
    
     /**
    * @ORM\PrePersist
    */
    public function updateDatecreate()
    {
        $this->getUser()->setEmail($this->getEmail());
    }
    /**
    * @ORM\PreUpdate
    */
    public function updateDateupdate()
    {
         $this->getUser()->setEmail($this->getEmail());
    }
    
    
    public function getAgentProfil()
    {
        return $this->getNomprenom().' ('.$this->getUser()->getProfil()->getLibelle().')';
    }
    
}
