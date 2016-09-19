<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\ChargeCabinet;
use BZ\ModelBundle\Form\ChargeCabinetType;

class ChargeCabinetController extends Controller
{
    public function create_chargecabinetAction($exercice)
    {
            $chargecabinet= new ChargeCabinet;
            $chargecabinet->setEstdelete(false);
            $chargecabinet->setExercice($this->getDoctrine()->getManager()->getRepository('BZModelBundle:Exercice')->find($exercice));
            $chargecabinet->setLoginpersist($this->getUser()->getUsername());
            $chargecabinet->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ChargeCabinetType(), $chargecabinet); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($chargecabinet);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('read_chargecabinet', Array( 'exercice' => $exercice)));
                }
            }
             return $this->render('BZVueBundle:ChargeCabinet:create_chargecabinet.html.twig', 
                     array('menu_num' => 1, 'exercice' => $exercice,'form'   => $form->createView()));             
    }
    
    public function read_chargecabinetAction($exercice)
    {
            $chargecabinets= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ChargeCabinet')
                                      ->findBy(Array('estdelete'=>false, 'exercice'=>$exercice),Array('datecharge'=>'ASC'));
             $getexercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('annee'=>'ASC'));
             return $this->render('BZVueBundle:ChargeCabinet:read_chargecabinet.html.twig', 
                     array('menu_num' => 1,'exercice' => $exercice, 'chargecabinets' => $chargecabinets, 'getExercices' => $getexercices));             
    }
    
    public function update_chargecabinetAction($id)
    {
            $chargecabinet= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ChargeCabinet')
                                      ->find($id);
            $form = $this->createForm(new ChargeCabinetType(), $chargecabinet); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $chargecabinet->setLoginpersist($this->getUser()->getUsername());
                    $chargecabinet->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:ChargeCabinet:update_chargecabinet.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_chargecabinetAction($id)
    {
            $chargecabinet= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ChargeCabinet')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $em->remove($chargecabinet);
                    $em->flush();
            }
            $element=$chargecabinet;
             return $this->render('BZVueBundle:ChargeCabinet:delete_chargecabinet.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
