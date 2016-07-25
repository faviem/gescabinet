<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IdentiteStructure
 *
 * @ORM\Table(name="identitestructure")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\IdentiteStructureRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class IdentiteStructure
{
    /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\PhotoPersonnel", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $photopersonnel;
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
     * @ORM\Column(name="nomcabinet", type="string", length=255, nullable=true)
     */
    private $nomcabinet;

    /**
     * @var string
     *
     * @ORM\Column(name="raisonsociale", type="string", length=255, nullable=true)
     */
    private $raisonsociale;
    /**
     * @var string
     *
     * @ORM\Column(name="telcabinet", type="string", length=100, nullable=true)
     */
    private $telcabinet;
    /**
     * @var string
     *
     * @ORM\Column(name="emailcabinet", type="string", length=100, nullable=true)
     */
    private $emailcabinet;
    /**
     * @var string
     *
     * @ORM\Column(name="immatcabinet", type="string", length=155, nullable=true)
     */
    private $immatcabinet;
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    

    /**
     * Set nomcabinet
     *
     * @param string $nomcabinet
     * @return IdentiteStructure
     */
    public function setNomcabinet($nomcabinet)
    {
        $this->nomcabinet = $nomcabinet;

        return $this;
    }

    /**
     * Get nomcabinet
     *
     * @return string 
     */
    public function getNomcabinet()
    {
        return $this->nomcabinet;
    }

    /**
     * Set raisonsociale
     *
     * @param string $raisonsociale
     * @return IdentiteStructure
     */
    public function setRaisonsociale($raisonsociale)
    {
        $this->raisonsociale = $raisonsociale;

        return $this;
    }

    /**
     * Get raisonsociale
     *
     * @return string 
     */
    public function getRaisonsociale()
    {
        return $this->raisonsociale;
    }

    /**
     * Set telcabinet
     *
     * @param string $telcabinet
     * @return IdentiteStructure
     */
    public function setTelcabinet($telcabinet)
    {
        $this->telcabinet = $telcabinet;

        return $this;
    }

    /**
     * Get telcabinet
     *
     * @return string 
     */
    public function getTelcabinet()
    {
        return $this->telcabinet;
    }

    /**
     * Set emailcabinet
     *
     * @param string $emailcabinet
     * @return IdentiteStructure
     */
    public function setEmailcabinet($emailcabinet)
    {
        $this->emailcabinet = $emailcabinet;

        return $this;
    }

    /**
     * Get emailcabinet
     *
     * @return string 
     */
    public function getEmailcabinet()
    {
        return $this->emailcabinet;
    }

    /**
     * Set immatcabinet
     *
     * @param string $immatcabinet
     * @return IdentiteStructure
     */
    public function setImmatcabinet($immatcabinet)
    {
        $this->immatcabinet = $immatcabinet;

        return $this;
    }

    /**
     * Get immatcabinet
     *
     * @return string 
     */
    public function getImmatcabinet()
    {
        return $this->immatcabinet;
    }

    /**
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return IdentiteStructure
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
     * @return IdentiteStructure
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
     * Set photopersonnel
     *
     * @param \BZ\ModelBundle\Entity\PhotoPersonnel $photopersonnel
     * @return IdentiteStructure
     */
    public function setPhotopersonnel(\BZ\ModelBundle\Entity\PhotoPersonnel $photopersonnel = null)
    {
        $this->photopersonnel = $photopersonnel;

        return $this;
    }

    /**
     * Get photopersonnel
     *
     * @return \BZ\ModelBundle\Entity\PhotoPersonnel 
     */
    public function getPhotopersonnel()
    {
        return $this->photopersonnel;
    }
}
