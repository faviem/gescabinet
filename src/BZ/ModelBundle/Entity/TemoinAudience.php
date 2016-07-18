<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TemoinAudience
 *
 * @ORM\Table(name="temoinaudience")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\TemoinAudienceRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class TemoinAudience
{
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\TacheAudience")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $tacheaudience;
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
     * @ORM\Column(name="nomcomplet", type="string", length=255)
     */
    private $nomcomplet;
    
    /**
     * @var string
     *
     * @ORM\Column(name="contactcomplet", type="string", length=155)
     */
    private $contactcomplet;
    
    /**
     * @var string
     *
     * @ORM\Column(name="propostemoin", type="string", length=255)
     */
    private $propostemoin;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="estadversaire", type="boolean", nullable=true)
     */
    private $estadversaire;
    
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
     * Set nomcomplet
     *
     * @param string $nomcomplet
     * @return TemoinAudience
     */
    public function setNomcomplet($nomcomplet)
    {
        $this->nomcomplet = $nomcomplet;

        return $this;
    }

    /**
     * Get nomcomplet
     *
     * @return string 
     */
    public function getNomcomplet()
    {
        return $this->nomcomplet;
    }
    
    /**
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return TemoinAudience
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
     * @return TemoinAudience
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
     * @return TemoinAudience
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
     * @return TemoinAudience
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
     * @return TemoinAudience
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
     * Set contactcomplet
     *
     * @param string $contactcomplet
     * @return TemoinAudience
     */
    public function setContactcomplet($contactcomplet)
    {
        $this->contactcomplet = $contactcomplet;

        return $this;
    }

    /**
     * Get contactcomplet
     *
     * @return string 
     */
    public function getContactcomplet()
    {
        return $this->contactcomplet;
    }

    /**
     * Set propostemoin
     *
     * @param string $propostemoin
     * @return TemoinAudience
     */
    public function setPropostemoin($propostemoin)
    {
        $this->propostemoin = $propostemoin;

        return $this;
    }

    /**
     * Get propostemoin
     *
     * @return string 
     */
    public function getPropostemoin()
    {
        return $this->propostemoin;
    }

    /**
     * Set estadversaire
     *
     * @param boolean $estadversaire
     * @return TemoinAudience
     */
    public function setEstadversaire($estadversaire)
    {
        $this->estadversaire = $estadversaire;

        return $this;
    }

    /**
     * Get estadversaire
     *
     * @return boolean 
     */
    public function getEstadversaire()
    {
        return $this->estadversaire;
    }

    /**
     * Set tacheaudience
     *
     * @param \BZ\ModelBundle\Entity\TacheAudience $tacheaudience
     * @return TemoinAudience
     */
    public function setTacheaudience(\BZ\ModelBundle\Entity\TacheAudience $tacheaudience = null)
    {
        $this->tacheaudience = $tacheaudience;

        return $this;
    }

    /**
     * Get tacheaudience
     *
     * @return \BZ\ModelBundle\Entity\TacheAudience 
     */
    public function getTacheaudience()
    {
        return $this->tacheaudience;
    }
}
