<?php
/*
 * This file is part of the Gestion Internet Game Center package.
 *
 * (c) Blue Zone <contact@bluezone.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace BZ\UserBundle\Entity;

/**
 * Load default users
 *
 * @author Jacques Adjahoungbo <tocicason@hotmail.fr>
 */

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="BZ\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 */
class User extends BaseUser
{

    /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\Agent")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $agent;
    
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Profil")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $profil;
   /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\PhotoPersonnel", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $photopersonnel;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="user_isconnect", type="string", length=1, nullable=true)
     */
    private $isconnect;

    /**
     * Constructor
     */
    public function __construct()
    {
         parent::__construct();
    }

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
     * Set isconnect
     *
     * @param string $isconnect
     * @return User
     */
    public function setIsconnect($isconnect)
    {
        $this->isconnect = $isconnect;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getIsconnect()
    {
        return $this->isconnect;
    }

    /**
     * Set profil
     *
     * @param \BZ\ModelBundle\Entity\Profil $profil
     * @return User
     */
    public function setProfil(\BZ\ModelBundle\Entity\Profil $profil = null)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \BZ\ModelBundle\Entity\Profil 
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set photopersonnel
     *
     * @param \BZ\ModelBundle\Entity\PhotoPersonnel $photopersonnel
     * @return User
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

    /**
     * Set agent
     *
     * @param \BZ\ModelBundle\Entity\Agent $agent
     * @return User
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
    
    public function getNomPrenom()
    {
        $nomprenom='*** ??? ***';
        if($this->getAgent() !=null)
        {
            $nomprenom=$this->getAgent()->getNomprenom(); 
        }
        return $nomprenom;
    }
    
    
}
