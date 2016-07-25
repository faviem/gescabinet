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
use BZ\ModelBundle\Entity\Agent;
use BZ\ModelBundle\Entity\IdentiteStructure;
use BZ\ModelBundle\Entity\Profil;
use BZ\UserBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
class LoadAgent extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    
    public function load(ObjectManager $manager)
    {
         $structure= new IdentiteStructure;
        $structure->setNomcabinet("Cabinet COMPTENCE PLUS +");
        $structure->setRaisonsociale("La Solution Informatique");
        $structure->setTelcabinet("+229 ......................");
        $manager->persist($structure);
        $manager->flush();
//          $manager->flush();
//            $toutprofil= $manager->getRepository('BZModelBundle:Profil')->findAll();
//              foreach ($toutprofil as $element){
//                $manager->remove($element);
//            }
//          $manager->flush();
          $toutagent= $manager->getRepository('BZModelBundle:Agent')->findAll();
            foreach ($toutagent as $element){
                $manager->remove($element);
            }
          $manager->flush();
         
            $toutuser= $manager->getRepository('BZUserBundle:User')->findAll();
            foreach ($toutuser as $element){
                $manager->remove($element);
            }
          $manager->flush();
          
        $manager->flush();
        $profil = new Profil;
        $profil->setCode("ROLE_ADMIN");
        $profil->setLibelle("Administrateur");
        $manager->persist($profil);
        $manager->flush();
       
        $user= new User;
        $user->setUsername('admin');        
        $user->setEnabled(true);
        $user->setEmail('faviem2012@gmail.com');
        $user->setPlainPassword('admin');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setProfil($profil);
        $manager->persist($user);
        $manager->flush();
        $agent = new Agent();
        $agent->setNom("FADONOUGBO");
        $agent->setPrenom("Emile");
        $agent->setFonction('PDG Gérant');
        $agent->setEmail("faviem2012@gmail.com");
        $agent->setLoginpersist("admin");
        $agent->setEstdelete(false);
//        $agent->setService(null);
        $agent->setUser($user);
        // On le persiste
        $manager->persist($agent);
        $user->setAgent($agent);
        
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