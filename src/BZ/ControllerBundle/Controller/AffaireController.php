<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Affaire;
use BZ\ModelBundle\Entity\TacheAffaire;
use BZ\ModelBundle\Entity\ClientPhysique;
use BZ\ModelBundle\Entity\AdversairePhysique;
use BZ\ModelBundle\Form\ClientPhysiqueType;
use BZ\ModelBundle\Form\TacheAffaireType;
use BZ\ModelBundle\Form\AdversairePhysiqueType;
use BZ\ModelBundle\Form\AffaireType;

class AffaireController extends Controller
{
    public function create_affaireAction()
    {
            $affaire= new Affaire;
            $affaire->setEstdelete(false);
            $affaire->setEstarchivee(false);
            $affaire->setEstentraitement(false);
            $affaire->setEstnouveau(true);
            $affaire->setLoginpersist($this->getUser()->getUsername());
            $affaire->setDatepersist(new \ Datetime());
            $formaffaire = $this->createForm(new AffaireType(), $affaire); 
            
            $client = new ClientPhysique;
            $client->setLoginpersist($this->getUser()->getUsername());
            $client->setDatepersist(new \ Datetime());
            $client->setEstdelete(false);
            $formclient= $this->createForm(new ClientPhysiqueType(), $client); 
            
            $adversaire = new AdversairePhysique;
            $adversaire->setLoginpersist($this->getUser()->getUsername());
            $adversaire->setDatepersist(new \ Datetime());
            $adversaire->setEstdelete(false);
            $formadversaire= $this->createForm(new AdversairePhysiqueType(), $adversaire); 
            
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $formclient->bind($request);
                
                $formadversaire->bind($request);
              
                $formaffaire->bind($request);
                if ($formaffaire->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $affaire->setClientphysique($client);
                    $affaire->setAdversairephysique($adversaire);
                    $em->persist($affaire);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('ajouter_pieceaffaire', Array('id'=>$affaire->getId())));
                }
            }
             return $this->render('BZVueBundle:Affaire:create_affaire.html.twig', 
                     array('menu_num' => 1, 'formaffaire'   => $formaffaire->createView(), 'formadverse'   => $formadversaire->createView(), 'formclient'   => $formclient->createView()));             
    }
    
    public function read_nouveauaffaireAction()
    {
            $affaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->findBy(Array('estnouveau'=>true,'estentraitement'=>false,'estdelete'=>false));
             return $this->render('BZVueBundle:Affaire:read_nouveauaffaire.html.twig', 
                     array('menu_num' => 1, 'affaires' => $affaires));             
    }
    
    public function consulter_affaireAction($id)
    {
            $affaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->find($id);
             return $this->render('BZVueBundle:Affaire:consulter_affaire.html.twig', 
                     array('menu_num' => 1, 'affaire' => $affaire));             
    }
    
    public function update_affaireAction($id)
    {
            $affaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->find($id);
            $formaffaire = $this->createForm(new AffaireType(), $affaire); 
            $client = $affaire->getClientphysique();
             $formclient= $this->createForm(new ClientPhysiqueType(), $client); 
            $adversaire = $affaire->getAdversairephysique();
            $formadversaire= $this->createForm(new AdversairePhysiqueType(), $adversaire); 
            
             $request = $this->get('request');
                if ($request->getMethod() == 'POST') 
                {
                    $formclient->bind($request);

                    $formadversaire->bind($request);

                    $formaffaire->bind($request);
                    if ($formaffaire->isValid()) {
                        $em = $this->getDoctrine()->getManager();
//                        $affaire->setClientphysique($client);
//                        $affaire->setAdversairephysique($adversaire);
//                        $em->persist($affaire);
                        $em->flush();
                        return $this->redirect( $this->generateUrl('ajouter_pieceaffaire', Array('id'=>$id)));
                    }
                }
                
             return $this->render('BZVueBundle:Affaire:update_affaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'formaffaire'   => $formaffaire->createView(), 'formadverse'   => $formadversaire->createView(), 'formclient'   => $formclient->createView()));             
    }
    
       
    public function delete_affaireAction($id)
    {
            $affaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $affaire->setLogindelete($this->getUser()->getUsername());
                    $affaire->setDatedelete(new \ Datetime());
                    $affaire->setEstdelete(true);
                    foreach ($affaire->getTacheaffaires() as $i){
                        $i->setLogindelete($this->getUser()->getUsername());
                        $i->setDatedelete(new \ Datetime());
                        $i->setEstdelete(true);
                        foreach ($i->getTacheaudiences() as $j){
                           $j->setLogindelete($this->getUser()->getUsername());
                           $j->setDatedelete(new \ Datetime());
                           $j->setEstdelete(true);
                       }
                    }
                   
                    foreach ($affaire->getReglementaffaires() as $k){
                        $k->setLogindelete($this->getUser()->getUsername());
                        $k->setDatedelete(new \ Datetime());
                        $k->setEstdelete(true);
                    }
                    $em->flush();
            }
            $element=$affaire;
             return $this->render('BZVueBundle:Affaire:delete_affaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'affaire' => $element ));             
    }
    
    public function archiver_affaireAction($id)
    {
            $affaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $affaire->setEstarchivee(true);
                    $affaire->setDatearchivee(new \ Datetime());
                    $em->flush();
                    return $this->redirect( $this->generateUrl('read_affairetraitement'));
            }
        
          return $this->render('BZVueBundle:Affaire:archiver_affaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'affaire' => $affaire ));       
                
    }
    
    public function delete_archiveaffaireAction($id)
    {
            $affaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $affaire->setEstarchivee(false);
                    $affaire->setDatearchivee(null);
                    $em->flush();
                //    return $this->redirect( $this->generateUrl('read_affairetraitement'));
            }
             return $this->render('BZVueBundle:Affaire:delete_archiveaffaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'affaire' => $affaire ));            
    }
    
    public function  read_dossierarchiveAction($exercice)
    {
            $affaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->findBy(Array('exercice'=>$exercice,'estnouveau'=>true,'estentraitement'=>true,'estdelete'=>false, 'estarchivee'=>true));
            $getexercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('annee'=>'ASC'));
            
            return $this->render('BZVueBundle:Affaire:read_dossierarchive.html.twig', 
                     array('menu_num' => 1, 'affaires' => $affaires, 'exercice'=>$exercice, 'getExercices' => $getexercices));             
    }
   
    //les taches affaires
    public function affecter_affaireAction($id)
    {
            $affaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->find($id);
             $tacheaffaire = new TacheAffaire;
             $tacheaffaire->setAffaire($affaire);
             $tacheaffaire->setEstdelete(false);
             $tacheaffaire->setEstresolue(false);
             $tacheaffaire->setEstvue(false);
             $tacheaffaire->setLoginpersist($this->getUser()->getUsername());
             $tacheaffaire->setDatepersist(new \ Datetime());
             $tacheaffaire->setDateassignee(new \ Datetime());
             $tacheaffaire->setAgentexpediteur($this->getDoctrine() ->getManager()
                     ->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>$this->getUser()->getId())));
             
             $form= $this->createForm(new TacheAffaireType(), $tacheaffaire);
             
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                    if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $affaire->setEstentraitement(true);
                  $em->persist($tacheaffaire);
                    $em->flush();
                  }
             }
             return $this->render('BZVueBundle:Affaire:affecter_affaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'affaire' => $affaire, 'form'   => $form->createView(), ));             
    }
 
    public function read_affairetraitementAction()
    {
            $affaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->findBy(Array('estentraitement'=>true,'estarchivee'=>false,'estdelete'=>false));
             return $this->render('BZVueBundle:Affaire:read_affairetraitement.html.twig', 
                     array('menu_num' => 1, 'affaires' => $affaires));             
    }
    
    public function delete_tacheaffaireAction($id)
    {
            $tacheaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAffaire')
                                      ->find($id);
            $affaire = $tacheaffaire->getAffaire();
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $em = $this->getDoctrine()->getManager();
                $em->remove($tacheaffaire);
                $em->flush();
                if($affaire->getTacheaffaires() == null){
                    $affaire->setEstentraitement(false);
                }
                $em->flush();
             }
             return $this->render('BZVueBundle:Affaire:delete_tacheaffaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'tacheaffaire' => $tacheaffaire, 'affaire' => $affaire ));             
    }
    
    public function consulter_tacheaffaireAction($id)
    {
            $tacheaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAffaire')
                                      ->find($id);
            $affaire = $tacheaffaire->getAffaire();
            
             return $this->render('BZVueBundle:Affaire:consulter_tacheaffaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'tacheaffaire' => $tacheaffaire, 'affaire' => $affaire ));             
    }
    
    public function consulter_tacheaffaireautreAction($id, $exercice)
    {
            $affaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->find($id);
            
             return $this->render('BZVueBundle:Affaire:consulter_tacheaffaireautre.html.twig', 
                     array('menu_num' => 1,'id' => $id,  'affaire' => $affaire,  'exercice' => $exercice ));             
    }
    
    
    
    
}
