<?php
// src/BZ/ModelBundle/Entity/PieceAffaire.php
namespace BZ\ModelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
// N'oubliez pas ce use :
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
* BZ\ModelBundle\Entity\PieceAffaire
*
* @ORM\Table(name="pieceaffaire")
* @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\PieceAffaireRepository")
* @ORM\HasLifecycleCallbacks
*/
class PieceAffaire
{
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Affaire", inversedBy="pieceaffaires")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $affaire;
    /**
    * @var integer $id
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;
    /**
    * @var string $url
    *
    * @ORM\Column(name="url", type="string", length=255, nullable=true)
    */
    private $url;
    /**
    * @var string $alt
    *
    * @ORM\Column(name="alt", type="string", length=255, nullable=true)
    */
    private $alt;

        /**
         * @var \DateTime
         *
         * @ORM\Column(name="dateEnregistrement", type="datetime", nullable=true)
         */
        private $dateEnregistrement;

    public function __construct() {
            $this->updateDate();
            $this->preUpload();
            $this->upload();
//            $this->preRemoveUpload();
//            $this->removeUpload();
        }

    // Les getters et setters

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
         * Set url
         *
         * @param string $url
         * @return PieceAffaire
         */
        public function setUrl($url)
        {
            $this->url = $url;

            return $this;
        }

        /**
         * Get url
         *
         * @return string 
         */
        public function getUrl()
        {
            return $this->url;
        }

        /**
         * Set alt
         *
         * @param string $alt
         * @return PieceAffaire
         */
        public function setAlt($alt)
        {
            $this->alt = $alt;

            return $this;
        }

        /**
         * Get alt
         *
         * @return string 
         */
        public function getAlt()
        {
            return $this->alt;
        }

        /**
         * Set dateEnregistrement
         *
         * @param \DateTime $dateEnregistrement
         * @return PieceAffaire
         */
        public function setDateEnregistrement($dateEnregistrement)
        {
            $this->dateEnregistrement = $dateEnregistrement;

            return $this;
        }
        /**
         * Get dateEnregistrement
         *
         * @return \DateTime 
         */
        public function getDateEnregistrement()
        {
            return $this->dateEnregistrement;
        }
        /**
        * @ORM\PreUpdate
        * @ORM\PrePersist
        */
        public function updateDate()
        {
            $this->setDateEnregistrement(new \Datetime());
        }

       private $file;

       // On ajoute cet attribut pour y stocker le nom du fichier temporairement
        private $tempFilename;
        // On modifie le setter de File, pour prendre en compte l'upload d'un fichier lorsqu'il en existe déjà un autre
        public function setFile(UploadedFile  $file)
        {
        $this->file = $file;
        // On vérifie si on avait déjà un fichier pour cette entité
        if (null !== $this->url) 
            {
            // On sauvegarde l'extension du fichier pour le supprimer plus tard
            $this->tempFilename = $this->url;
            // On réinitialise les valeurs des attributs url et alt
            $this->url = null;
            $this->alt = null;
            }
        }

        public function getFile()
        {
            return $this->file;
        }
        /**
        * @ORM\PrePersist()
        * @ORM\PreUpdate()
        */
        public function preUpload()
        {
            // Si jamais il n'y a pas de fichier (champ facultatif)
            if (null === $this->file) {
            return;
    //            $file= new UploadedFile("C:\wamp\www\Symfony\web\user.jpg", "user.jpg");
    //            $this->setFile($file);
            }
            // Le nom du fichier est son id, on doit juste stocker également son extension
            // Pour faire propre, on devrait renommer cet attribut en « extension », plutôt que « url »
            $this->url = $this->file->guessExtension();
            // Et on génère l'attribut alt de la balise <PieceAffaire>, à la valeur du nom du fichier sur le PC de l'internaute
            $this->alt = $this->file->getClientOriginalName();
            }
            /**
            * @ORM\PostPersist()
            * @ORM\PostUpdate()
            */
            public function upload()
            {
                // Si jamais il n'y a pas de fichier (champ facultatif)
                if (null === $this->file) {
                return;
                }
                // Si on avait un ancien fichier, on le supprime
                if (null !== $this->tempFilename) {
                    $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
                    if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            // On déplace le fichier envoyé dans le répertoire de notre choix
            $this->file->move(
            $this->getUploadRootDir(), // Le répertoire de destination
            $this->id.'.'.$this->url // Le nom du fichier à créer, ici « id.extension »
            );
        }
        /**
        * @ORM\PreRemove()
        */
        public function preRemoveUpload()
        {
        // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->url;
        }
        /**
        * @ORM\PostRemove()
        */
        public function removeUpload()
        {
        // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
        if (file_exists($this->tempFilename)) {
        // On supprime le fichier
        unlink($this->tempFilename);
        }
        }
        public function getUploadDir()
        {
        // On retourne le chemin relatif vers l'image pour un navigateur
        return 'uploads/PieceAffaire';
        }
        protected function getUploadRootDir()
        {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
        }
        
        public function getNameFile()
        {
           return $this->getAlt();
        }

        // …
        public function getWebPath()
        {
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getUrl();
        }
        // …
        public function getDowloadPath()
        {
        return 'uploads/PieceAffaire/'.$this->getId().'.'.$this->getUrl();
        }
        /**
        * @param BZ\UserBundle\Entity\User $user
        */
        public function setUser(\BZ\UserBundle\Entity\User $user =null)
        {
            $this->user = $user;
        }
       

    /**
     * Set affaire
     *
     * @param \BZ\ModelBundle\Entity\Affaire $affaire
     * @return PieceAffaire
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
}