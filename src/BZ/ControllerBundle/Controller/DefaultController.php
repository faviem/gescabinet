<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;
use BZ\ModelBundle\Entity\DiscussionReunion;
use BZ\ModelBundle\Entity\IdentiteStructure;
use BZ\ModelBundle\Form\IdentiteStructureType;

class DefaultController extends Controller
{
    public function indexAction()
    {
         
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirect( $this->generateUrl('fos_user_security_login'));
        }
        else
        {
            $userManager = $this->get('fos_user.user_manager');
            $user = $userManager->findUserBy(array('id' => $this->getUser()->getId()));
            $user->setIsconnect(1);
            $userManager->updateUser($user);
            $userManager->reloadUser($user);
            
            $affaire = $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->findBy(Array('estdelete'=>false));
            $exercice = $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false));
            $juridiction = $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Juridiction')
                                      ->findBy(Array('estdelete'=>false));
             $notes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:PartagerNote')
                                      ->findBy(Array('estarchivee'=>false,'estdelete'=>false, 'estpubliee'=>true, 'agentdestinataire'=>$this->getDoctrine() ->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>$this->getUser()))),Array('datepubliee'=>'ASC'));
            return $this->render('BZUserBundle::layout.html.twig',
                    array('notes'   =>$notes,'affaires'   =>$affaire, 'exercices'   =>$exercice, 'juridictions'   =>$juridiction));
        }
        
    }
    
    public function notificationsAction()
    {
         $discussions = $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DiscussionReunion')
                                      ->findBy(Array('estdelete'=>false),Array('datepersist'=>'ASC'));
          $blocdiscussion = $this->renderView('BZVueBundle::discussion.html.twig', array('discussions' => $discussions));  
          
          $tacheaudience = $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAudience')   
                                       ->findBy(Array('estdelete'=>false,'estresolue'=>false,
                                            'agentdestinataire'=>$this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId()))));
          $nbreaudience =0;
          foreach ($tacheaudience as $i) { $nbreaudience++; }
          
          $userconnectes= $this->getDoctrine()
                        ->getManager()
                        ->getRepository('BZUserBundle:User')->findBy(array('enabled' => true,'locked' => false,'isconnect' => "1"));
          $nbreusers =0;
          foreach ($userconnectes as $i) { 
              if ($i->getId()!=$this->getUser()->getId()){ $nbreusers++; }
               }
          
          $notes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:PartagerNote')
                                      ->findBy(Array('estarchivee'=>false,'estdelete'=>false, 'estpubliee'=>true, 'agentdestinataire'=>$this->getDoctrine() ->getManager()
                   ->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>$this->getUser()))));
           
          $nbrenotes=0;
          foreach ($notes as $i) { $nbrenotes++; }
          
           $tacheaffaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAffaire')
                                      ->findBy(Array('estdelete'=>false, 'estresolue'=>false,
                                          'agentdestinataire'=>$this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId()))));
          $nbretache =0;
          foreach ($tacheaffaires as $i) { $nbretache++; }  
           
          $response = new Response(json_encode(array('contenu' => $blocdiscussion,
              'nbreaudience' => $nbreaudience, 'nbreuser' => $nbreusers, 'nbrenote' => $nbrenotes, 'nbretache' => $nbretache)));
          
                $response->headers->set('Content-Type', 'application/json');
                return    $response;
    }
    
    public function envoi_smsAction()
    {
         $discussions = new DiscussionReunion;
            $discussions->setEstdelete(false);
            $discussions->setLoginpersist($this->getUser()->getUsername());
            $discussions->setDatepersist(new \ Datetime());
            $discussions->setMessage($_POST['contenumesg']);
            $discussions->setAgent($this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId())));
            $em = $this->getDoctrine()->getManager();
                    $em->persist($discussions);
                    $em->flush();
          $response = new Response(json_encode(array('rep' => 'ok')));
                $response->headers->set('Content-Type', 'application/json');
                return    $response;
    }
    
   public function identitestructureAction()
    {
            $identitestructure= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:IdentiteStructure')
                                      ->find(1);
            $form = $this->createForm(new IdentiteStructureType(), $identitestructure); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $identitestructure->setLoginpersist($this->getUser()->getUsername());
                    $identitestructure->setDatepersist(new \ Datetime());
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle::identitestructure.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
}
