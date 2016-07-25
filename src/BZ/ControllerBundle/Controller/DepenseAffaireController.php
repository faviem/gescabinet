<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\DepenseAffaire;
use BZ\ModelBundle\Form\DepenseAffaireType;

class DepenseAffaireController extends Controller
{
    public function create_depenseaffaireAction($id)
    {
            $depenseaffaire= new DepenseAffaire;
            $depenseaffaire->setEstdelete(false);
            $depenseaffaire->setLoginpersist($this->getUser()->getUsername());
            $depenseaffaire->setDatepersist(new \ Datetime());
          $depenseaffaire->setAffaire($this->getDoctrine()->getManager()->getRepository('BZModelBundle:Affaire')->find($id));
            $form = $this->createForm(new DepenseAffaireType(), $depenseaffaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($depenseaffaire);
                    $em->flush();
                    $depenseaffaire->getAffaire()->setCoutdepense($depenseaffaire->getAffaire()->getCoutdepense()+$depenseaffaire->getMontantdepense());
                    $em->flush();
                }
             return $this->redirect( $this->generateUrl('read_depenseaffaire', Array('choix' => 2)));
            }
             return $this->render('BZVueBundle:DepenseAffaire:create_depenseaffaire.html.twig', 
                     array('menu_num' => 1,'choix' => 2, 'id' => $id, 'form'   => $form->createView()));             
    }
    
    public function read_depenseaffaireAction()
    {
            $depenseaffaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DepenseAffaire')
                                      ->findBy(Array('estdelete'=>false),Array('datedepense'=>'ASC'));
            
            $affaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')
                                      ->findBy(Array('estdelete'=>false, 'estarchivee'=>false ),Array('dateaffaire'=>'ASC'));
          
             return $this->render('BZVueBundle:DepenseAffaire:read_depenseaffaire.html.twig', 
                     array('menu_num' => 1,'choix' => 1, 'depenseaffaires' => $depenseaffaires, 'affaires' => $affaires));             
    }

    public function update_depenseaffaireAction($id)
    {
            $depenseaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DepenseAffaire')
                                      ->find($id);
            $form = $this->createForm(new DepenseAffaireType(), $depenseaffaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $depenseaffaire->setLoginpersist($this->getUser()->getUsername());
                    $depenseaffaire->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $montant=0;
                    foreach ($depenseaffaire->getAffaire()->getDepenseAffaires() as $i){
                        $montant = $montant +$i->getMontantdepense(); 
                    }
                    $depenseaffaire->getAffaire()->setCoutdepense($montant);
                    $em->flush();
                }
               return $this->redirect( $this->generateUrl('read_depenseaffaire'));
            }
             return $this->render('BZVueBundle:DepenseAffaire:update_depenseaffaire.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_depenseaffaireAction($id)
    {
            $depenseaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DepenseAffaire')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $affaire= $depenseaffaire->getAffaire();
                    $em->remove($depenseaffaire);
                    $em->flush();
                    $montant=0;
                    foreach ($affaire->getDepenseAffaires() as $i){
                        $montant = $montant +$i->getMontantdepense(); 
                    }
                    $affaire->setCoutdepense($montant);
                   
                    $em->flush();
            }
            $element=$depenseaffaire;
             return $this->render('BZVueBundle:DepenseAffaire:delete_depenseaffaire.html.twig', 
                     array('menu_num' => 1,'id' => $id,'choix' => 2, 'element' => $element ));             
    }
    
}
