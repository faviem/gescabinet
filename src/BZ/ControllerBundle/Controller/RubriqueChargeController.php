<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\RubriqueCharge;
use BZ\ModelBundle\Form\RubriqueChargeType;

class RubriqueChargeController extends Controller
{
    public function create_rubriquechargeAction()
    {
            $rubriquecharge= new RubriqueCharge;
            $rubriquecharge->setEstdelete(false);
            $rubriquecharge->setLoginpersist($this->getUser()->getUsername());
            $rubriquecharge->setDatepersist(new \ Datetime());
            $form = $this->createForm(new RubriqueChargeType(), $rubriquecharge); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($rubriquecharge);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:RubriqueCharge:create_rubriquecharge.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_rubriquechargeAction()
    {
            $rubriquecharges= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:RubriqueCharge')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:RubriqueCharge:read_rubriquecharge.html.twig', 
                     array('menu_num' => 1, 'rubriquecharges' => $rubriquecharges));             
    }
    
    public function update_rubriquechargeAction($id)
    {
            $rubriquecharge= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:RubriqueCharge')
                                      ->find($id);
            $form = $this->createForm(new RubriqueChargeType(), $rubriquecharge); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $rubriquecharge->setLoginpersist($this->getUser()->getUsername());
                    $rubriquecharge->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:RubriqueCharge:update_rubriquecharge.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_rubriquechargeAction($id)
    {
            $rubriquecharge= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:RubriqueCharge')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $rubriquecharge->setLogindelete($this->getUser()->getUsername());
                    $rubriquecharge->setDatedelete(new \ Datetime());
                    $rubriquecharge->setEstdelete(true);
                    $em->flush();
            }
            $element=$rubriquecharge->getLibelle();
             return $this->render('BZVueBundle:RubriqueCharge:delete_rubriquecharge.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
