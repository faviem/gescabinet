<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\StatutAudience;
use BZ\ModelBundle\Form\StatutAudienceType;

class StatutAudienceController extends Controller
{
    public function create_statutaudienceAction()
    {
            $statutaudience= new StatutAudience;
            $statutaudience->setEstdelete(false);
            $statutaudience->setLoginpersist($this->getUser()->getUsername());
            $statutaudience->setDatepersist(new \ Datetime());
            $form = $this->createForm(new StatutAudienceType(), $statutaudience); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($statutaudience);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:StatutAudience:create_statutaudience.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_statutaudienceAction()
    {
            $statutaudiences= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:StatutAudience')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:StatutAudience:read_statutaudience.html.twig', 
                     array('menu_num' => 1, 'statutaudiences' => $statutaudiences));             
    }
    
    public function update_statutaudienceAction($id)
    {
            $statutaudience= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:StatutAudience')
                                      ->find($id);
            $form = $this->createForm(new StatutAudienceType(), $statutaudience); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $statutaudience->setLoginpersist($this->getUser()->getUsername());
                    $statutaudience->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:StatutAudience:update_statutaudience.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_statutaudienceAction($id)
    {
            $statutaudience= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:StatutAudience')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $statutaudience->setLogindelete($this->getUser()->getUsername());
                    $statutaudience->setDatedelete(new \ Datetime());
                    $statutaudience->setEstdelete(true);
                    $em->flush();
            }
            $element=$statutaudience->getLibelle();
             return $this->render('BZVueBundle:StatutAudience:delete_statutaudience.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
