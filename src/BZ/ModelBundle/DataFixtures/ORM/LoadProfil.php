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

namespace BZ\ModelBundle\DataFixtures\ORM;

/**
 */

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BZ\ModelBundle\Entity\Profil;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
class LoadProfil extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    
    public function load(ObjectManager $manager)
    {
        
            
            $profil5= new Profil;
            $profil5->setCode("ROLE_AVOCAT");
            $profil5->setLibelle("Avocat");
            $manager->persist($profil5);
            
            $profil4= new Profil;
            $profil4->setCode("ROLE_COLLABORATEUR");
            $profil4->setLibelle("Avocat Collaborateur");
            $manager->persist($profil4);
            
            $profil6= new Profil;
            $profil6->setCode("ROLE_COMPTABLE");
            $profil6->setLibelle("Comptable");
            $manager->persist($profil6);
            
            $profil7= new Profil;
            $profil7->setCode("ROLE_SECRETAIRE");
            $profil7->setLibelle("Secrétaire");
            $manager->persist($profil7);
            
            $profil3= new Profil;
            $profil3->setCode("ROLE_STAGIAIRE");
            $profil3->setLibelle("Stagiaire");
            $manager->persist($profil3);
            
            $profil2= new Profil;
            $profil2->setCode("ROLE_USER");
            $profil2->setLibelle("Membre");
            $manager->persist($profil2);
            
            $manager->flush();
        
       
    }
    /**
    * {@inheritdoc}
    */
    public function getOrder()
    {
    return 1;
    } 
    
}