<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\ObjetLitige;
use BZ\ModelBundle\Form\ObjetLitigeType;

class ObjetLitigeController extends Controller
{
    public function create_objetlitigeAction()
    {
            $objetlitige= new ObjetLitige;
            $objetlitige->setEstdelete(false);
            $objetlitige->setLoginpersist($this->getUser()->getUsername());
            $objetlitige->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ObjetLitigeType(), $objetlitige); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($objetlitige);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:ObjetLitige:create_objetlitige.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_objetlitigeAction()
    {
            $objetlitiges= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ObjetLitige')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:ObjetLitige:read_objetlitige.html.twig', 
                     array('menu_num' => 1, 'objetlitiges' => $objetlitiges));             
    }
    
    public function update_objetlitigeAction($id)
    {
            $objetlitige= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ObjetLitige')
                                      ->find($id);
            $form = $this->createForm(new ObjetLitigeType(), $objetlitige); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $objetlitige->setLoginpersist($this->getUser()->getUsername());
                    $objetlitige->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:ObjetLitige:update_objetlitige.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_objetlitigeAction($id)
    {
            $objetlitige= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ObjetLitige')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $objetlitige->setLogindelete($this->getUser()->getUsername());
                    $objetlitige->setDatedelete(new \ Datetime());
                    $objetlitige->setEstdelete(true);
                    $em->flush();
            }
            $element=$objetlitige->getLibelle();
             return $this->render('BZVueBundle:ObjetLitige:delete_objetlitige.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
