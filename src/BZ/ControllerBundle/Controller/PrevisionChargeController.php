<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\PrevisionCharge;
use BZ\ModelBundle\Form\PrevisionChargeType;

class PrevisionChargeController extends Controller
{
    
    public function read_previsionchargeAction($exercice)
    {
            $previsioncharges= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:RubriqueCharge')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
            $getexercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('annee'=>'ASC'));
             return $this->render('BZVueBundle:PrevisionCharge:read_previsioncharge.html.twig', 
                     array('menu_num' => 1, 'previsioncharges' => $previsioncharges, 'exercice' => $exercice, 'getExercices' => $getexercices));             
    }
    
    public function read_suivibudgetAction($exercice)
    {
            $previsioncharges= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:RubriqueCharge')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
            $getexercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('annee'=>'ASC'));
             return $this->render('BZVueBundle:PrevisionCharge:read_suivibudget.html.twig', 
                     array('menu_num' => 1, 'previsioncharges' => $previsioncharges, 'exercice' => $exercice, 'getExercices' => $getexercices));             
    }
    
    public function update_previsionchargeAction($id, $exercice)
    {
            $i=true;
            $rubrique = $this->getDoctrine()->getManager()->getRepository('BZModelBundle:RubriqueCharge')->find($id);
            $previsioncharge= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:PrevisionCharge')
                                      ->findOneBy(Array('exercice'=>$exercice, 'rubriquecharge'=>$id));
            if( $previsioncharge == null){
                 $i=false;
                $previsioncharge = new PrevisionCharge;
                $previsioncharge->setRubriquecharge($rubrique);
                $previsioncharge->setExercice($this->getDoctrine()->getManager()->getRepository('BZModelBundle:Exercice')->find($exercice));
            }
            $form = $this->createForm(new PrevisionChargeType(), $previsioncharge); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $previsioncharge->setLoginpersist($this->getUser()->getUsername());
                    $previsioncharge->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    if($i==false){
                        $em->persist($previsioncharge);
                    }
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:PrevisionCharge:update_previsioncharge.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id, 'rubrique' => $rubrique, 'exercice' => $exercice ));             
    }
    
    public function delete_previsionchargeAction($id, $exercice)
    {
            $previsioncharge= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:PrevisionCharge')
                                      ->findOneBy(Array('exercice'=>$exercice, 'rubriquecharge'=>$id));
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    if( $previsioncharge != null){
                        $em->remove($previsioncharge);
                    }
                    $em->flush();
            }
             return $this->render('BZVueBundle:PrevisionCharge:delete_previsioncharge.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $previsioncharge, 'exercice' => $exercice ));             
    }
    
}
