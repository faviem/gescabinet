<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* BZ\ModelBundle\Entity\PrevisionCharge
*
* @ORM\Table(name="previsioncharge")
* @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\PrevisionChargeRepository")
* @ORM\HasLifecycleCallbacks()
*/
class PrevisionCharge
{
   /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\RubriqueCharge", inversedBy="previsioncharges")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $rubriquecharge;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Exercice")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $exercice;
    
     /**
     * @var integer
     * 
     *  @ORM\Column(name="montantcharge", type="integer", nullable=true)
     * 
     */
    private $coutprevu;
    
    
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
     * @return PrevisionCharge
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
     * @return PrevisionCharge
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
     * @return PrevisionCharge
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
     * @return PrevisionCharge
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
     * @return PrevisionCharge
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
     * Set coutprevu
     *
     * @param integer $coutprevu
     * @return PrevisionCharge
     */
    public function setCoutprevu($coutprevu)
    {
        $this->coutprevu = $coutprevu;

        return $this;
    }

    /**
     * Get coutprevu
     *
     * @return integer 
     */
    public function getCoutprevu()
    {
        return $this->coutprevu;
    }

    /**
     * Set rubriquecharge
     *
     * @param \BZ\ModelBundle\Entity\RubriqueCharge $rubriquecharge
     * @return PrevisionCharge
     */
    public function setRubriquecharge(\BZ\ModelBundle\Entity\RubriqueCharge $rubriquecharge = null)
    {
        $this->rubriquecharge = $rubriquecharge;

        return $this;
    }

    /**
     * Get rubriquecharge
     *
     * @return \BZ\ModelBundle\Entity\RubriqueCharge 
     */
    public function getRubriquecharge()
    {
        return $this->rubriquecharge;
    }

    /**
     * Set exercice
     *
     * @param \BZ\ModelBundle\Entity\Exercice $exercice
     * @return PrevisionCharge
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
}
