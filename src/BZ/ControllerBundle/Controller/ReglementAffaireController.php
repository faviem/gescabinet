<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\ReglementAffaire;
use BZ\ModelBundle\Form\ReglementAffaireType;

class ReglementAffaireController extends Controller
{
    public function create_reglementaffaireAction($id, $exercice)
    {
            $reglementaffaire= new ReglementAffaire;
            $reglementaffaire->setEstdelete(false);
            $reglementaffaire->setLoginpersist($this->getUser()->getUsername());
            $reglementaffaire->setDatepersist(new \ Datetime());
            $reglementaffaire->setExercice($this->getDoctrine()->getManager()->getRepository('BZModelBundle:Exercice')->find($exercice));
            $reglementaffaire->setAffaire($this->getDoctrine()->getManager()->getRepository('BZModelBundle:Affaire')->find($id));
            $form = $this->createForm(new ReglementAffaireType(), $reglementaffaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($reglementaffaire);
                    $em->flush();
                     if($this->getAffaire()->getCoutrestant()-$this->getMontantregelement()<=0){
                       $this->getAffaire()->setEstreglee(true);
                    } else{
                         $this->getAffaire()->setEstreglee(false);
                    }
                   $this->getAffaire()->setCoutrestant($this->getAffaire()->getCoutrestant()-$this->getMontantregelement());
                   $em->flush();
                   }
             return $this->redirect( $this->generateUrl('read_reglementaffaire', Array('exercice'=>$exercice, 'choix' => 2)));
            }
             return $this->render('BZVueBundle:ReglementAffaire:create_reglementaffaire.html.twig', 
                     array('menu_num' => 1, 'exercice' => $exercice, 'choix' => 2, 'id' => $id, 'form'   => $form->createView()));             
    }
    
    public function read_reglementaffaireAction($exercice)
    {
            $reglementaffaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ReglementAffaire')
                                      ->findBy(Array('estdelete'=>false,'exercice'=>$exercice),Array('datereglement'=>'ASC'));
            
            $affaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->findBy(Array('estdelete'=>false, 'estreglee'=>false ),Array('dateaffaire'=>'ASC'));
            
             $getexercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('annee'=>'ASC'));
            
             return $this->render('BZVueBundle:ReglementAffaire:read_reglementaffaire.html.twig', 
                     array('getExercices' => $getexercices, 'menu_num' => 1,'choix' => 1, 'reglementaffaires' => $reglementaffaires, 'affaires' => $affaires, 'exercice' => $exercice,));             
    }
    
    public function read_affaireregleAction($exercice)
    {
            
            $affaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->findBy(Array('estdelete'=>false, 'estreglee'=>true,'exercice'=>$exercice ),Array('dateaffaire'=>'ASC'));
            
             $getexercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('annee'=>'ASC'));
            
             return $this->render('BZVueBundle:ReglementAffaire:read_affaireregle.html.twig', 
                     array('getExercices' => $getexercices, 'menu_num' => 1, 'affaires' => $affaires, 'exercice' => $exercice,));             
    }
    
    public function update_reglementaffaireAction($id)
    {
            $reglementaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ReglementAffaire')
                                      ->find($id);
           // $reglementaffaire->getAffaire()->setCoutrestant($reglementaffaire->getAffaire()->getCoutrestant()+$reglementaffaire->getMontantregelement());
            $form = $this->createForm(new ReglementAffaireType(), $reglementaffaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $reglementaffaire->setLoginpersist($this->getUser()->getUsername());
                    $reglementaffaire->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $montant=0;
                    foreach ($reglementaffaire->getAffaire()->getReglementAffaires() as $i){
                        $montant = $montant +$i->getMontantregelement(); 
                    }
                    $reglementaffaire->getAffaire()->setCoutrestant($reglementaffaire->getAffaire()->getCoutaffaire()-$montant);
                    if($reglementaffaire->getAffaire()->getCoutaffaire()-$montant<=0){
                        $reglementaffaire->getAffaire()->setEstreglee(true);
                    }
                    else{
                         $reglementaffaire->getAffaire()->setEstreglee(false);
                    }
                    $em->flush();
                }
             return $this->redirect( $this->generateUrl('read_reglementaffaire', Array('exercice'=>$reglementaffaire->getExercice()->getId(), 'choix' => 2)));
            }
             return $this->render('BZVueBundle:ReglementAffaire:update_reglementaffaire.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_reglementaffaireAction($id)
    {
            $reglementaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ReglementAffaire')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $affaire= $reglementaffaire->getAffaire();
                    $em->remove($reglementaffaire);
                    $em->flush();
                    $montant=0;
                    foreach ($affaire->getReglementAffaires() as $i){
                        $montant = $montant +$i->getMontantregelement(); 
                    }
                    $affaire->setCoutrestant($affaire->getCoutaffaire()-$montant);
                    if($affaire->getCoutaffaire()-$montant<=0){
                        $affaire->setEstreglee(true);
                    }
                    else{
                         $affaire->setEstreglee(false);
                    }
                     $em->flush();
            }
            $element=$reglementaffaire;
             return $this->render('BZVueBundle:ReglementAffaire:delete_reglementaffaire.html.twig', 
                     array('menu_num' => 1,'id' => $id,'choix' => 2, 'element' => $element ));             
    }
    
}
