<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\TacheAudience;
use BZ\ModelBundle\Form\TacheAudienceType;
use BZ\ModelBundle\Form\TacheAudienceAutreType;
use BZ\ModelBundle\Form\DateDebutAudienceType;
use BZ\ModelBundle\Form\DateFinAudienceType;

class TacheAffaireController extends Controller
{
    
    public function read_dossierrecusAction()
    {
            $tacheaffaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAffaire')
                                      ->findBy(Array('estdelete'=>false,
                                          'agentdestinataire'=>$this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId()))));
            
             return $this->render('BZVueBundle:TacheAffaire:read_dossierrecus.html.twig', 
                     array('menu_num' => 1, 'tacheaffaires' => $tacheaffaires));          
    }
    
    public function read_tachenonresolueAction()
    {
            $tacheaffaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAffaire')
                                      ->findBy(Array('estdelete'=>false, 'estresolue'=>false,
                                          'agentdestinataire'=>$this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId()))));
            
             return $this->render('BZVueBundle:TacheAffaire:read_tachenonresolue.html.twig', 
                     array('menu_num' => 1, 'tacheaffaires' => $tacheaffaires));          
    }
    
    public function read_audienceencoursAction()
    {
           $tacheaudience = $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAudience')   
                                       ->findBy(Array('estdelete'=>false,'estresolue'=>false,
                                            'agentdestinataire'=>$this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId()))));
           
             return $this->render('BZVueBundle:TacheAffaire:read_audienceencours.html.twig', 
                     array('menu_num' => 1, 'tacheaudiences' => $tacheaudience));          
    }
    
    public function suivre_tacheaffaireAction($id)
    {
            $tacheaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAffaire')
                                      ->find($id);
            $affaire = $tacheaffaire->getAffaire();
            
             return $this->render('BZVueBundle:TacheAffaire:suivre_tacheaffaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'tacheaffaire' => $tacheaffaire, 'affaire' => $affaire ));             
    }
    
    public function cloturer_tacheaffaireAction($id)
    {
            $tacheaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAffaire')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $tacheaffaire->setEstresolue(true);
                    $tacheaffaire->setDatevue(new \ Datetime());
                    $em->flush();
                    return $this->redirect( $this->generateUrl('read_dossierrecus'));
            }   
    }
    
    public function ajouter_audienceAction($id)
    {
          $tacheaffaire = $this->getDoctrine()->getManager()->getRepository('BZModelBundle:TacheAffaire')->find($id);
            
            $tacheaudience = new TacheAudience;
            $tacheaudience->setEstdelete(false);
            $tacheaudience->setEstresolue(false);
            $tacheaudience->setDateEnregistree(new \ Datetime());
            $tacheaudience->setTacheaffaire($tacheaffaire);
            $tacheaudience->setAgentenregistree($this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId())));
            $tacheaudience->setDatepersist(new \ Datetime());
            $form = $this->createForm(new TacheAudienceType(), $tacheaudience); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($tacheaudience);
                    $em->flush();
                   // return $this->redirect( $this->generateUrl('ajouter_pieceaffaire', Array('id'=>$affaire->getId())));
                }
            }
             return $this->render('BZVueBundle:TacheAffaire:ajouter_audience.html.twig', 
                     array('id' => $id, 'tacheaffaire' => $tacheaffaire,'menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function remove_audienceAction($id)
    {
          $tacheaudience = $this->getDoctrine()->getManager()->getRepository('BZModelBundle:TacheAudience')->find($id);
           
          $tacheaffaire = $tacheaudience->getTacheAffaire();
          $affaire = $tacheaffaire->getAffaire();
          
           $em = $this->getDoctrine()->getManager();
                    $em->remove($tacheaudience);
                    $em->flush();
                    
           return $this->render('BZVueBundle:TacheAffaire:suivre_tacheaffaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'tacheaffaire' => $tacheaffaire, 'affaire' => $affaire ));                     
    }
    
    public function read_audiencerecusAction($exercice)
    {
            $tacheaudiences= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAudience')
                                      ->findBy(Array('estdelete'=>false, 
                                          'agentdestinataire'=>$this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId()))));
            
               $getexercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('annee'=>'ASC'));
               
             return $this->render('BZVueBundle:TacheAffaire:read_audiencerecus.html.twig', 
                     array('menu_num' => 1, 'tacheaudiences' => $tacheaudiences, 'exercice'=>$exercice, 'getExercices' => $getexercices));          
    }
    
    public function agenda_periodiqueAction()
    {
          $datedebut = new TacheAudience;
          $datefin = new TacheAudience;
          $datedebut->setDateparticipee(new \ Datetime());
          $datefin->setDateEnregistree(new \ Datetime());
          $form1 = $this->createForm(new DateDebutAudienceType(), $datedebut); 
          $form2 = $this->createForm(new DateFinAudienceType(), $datefin); 
           $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form1->bind($request);
                $form2->bind($request);
                $tacheaudiences= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAudience')
                                      ->getAgenda($datedebut->getDateparticipee(),$datefin->getDateEnregistree(),$this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId())));
                                          //  ->getAgenda($datedebut->getDateparticipee(),$datefin->getDateEnregistree());
                
                return $this->render('BZVueBundle:TacheAffaire:agenda_periodique.html.twig', 
                     array('menu_num' => 1, 'tacheaudiences' => $tacheaudiences, 'form1'   => $form1->createView(), 'form2'   => $form2->createView())); 
            }
            $tacheaudiences= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAudience')
                                      ->findBy(Array('estdelete'=>false, 'estresolue'=>false, 'dateparticipee'=>new \ Datetime(), 'dateparticipee'=>new \ Datetime(),
                                          'agentdestinataire'=>$this->getDoctrine()->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>  $this->getUser()->getId()))));
            
             return $this->render('BZVueBundle:TacheAffaire:agenda_periodique.html.twig', 
                     array('menu_num' => 1, 'tacheaudiences' => $tacheaudiences, 'form1'   => $form1->createView(), 'form2'   => $form2->createView()));          
    }
    
   public function ajouter_tacheaudienceAction($id)
    {
            $tacheaudience = $this->getDoctrine()->getManager()->getRepository('BZModelBundle:TacheAudience')->find($id);
          
            $form = $this->createForm(new TacheAudienceAutreType(), $tacheaudience); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                      $tacheaudience->setEstresolue(true);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('ajouter_pieceaudience', Array('id'=>$tacheaudience->getId())));
                }
            }
             return $this->render('BZVueBundle:TacheAffaire:ajouter_tacheaudience.html.twig', 
                     array('id' => $id, 'tacheaudience' => $tacheaudience,'menu_num' => 1, 'form'   => $form->createView()));             
    }
    
   public function annuler_tacheaudienceAction($id)
    {
            $tacheaudience = $this->getDoctrine()->getManager()->getRepository('BZModelBundle:TacheAudience')->find($id);
          
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                      $tacheaudience->setEstresolue(false);
                    $em->flush();
             }
             return $this->render('BZVueBundle:TacheAffaire:annuler_tacheaudience.html.twig', 
                     array('id' => $id, 'tacheaudience' => $tacheaudience,'menu_num' => 1));             
    }
    
    
}
