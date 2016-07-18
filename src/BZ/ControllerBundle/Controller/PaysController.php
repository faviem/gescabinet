<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Pays;
use BZ\ModelBundle\Form\PaysType;

class PaysController extends Controller
{
    public function create_paysAction()
    {
            $pays= new Pays;
            $pays->setEstdelete(false);
            $pays->setLoginpersist($this->getUser()->getUsername());
            $pays->setDatepersist(new \ Datetime());
            $form = $this->createForm(new PaysType(), $pays); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($pays);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Pays:create_pays.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_paysAction()
    {
            $payss= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Pays')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:Pays:read_pays.html.twig', 
                     array('menu_num' => 1, 'payss' => $payss));             
    }
    
    public function update_paysAction($id)
    {
            $pays= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Pays')
                                      ->find($id);
            $form = $this->createForm(new PaysType(), $pays); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $pays->setLoginpersist($this->getUser()->getUsername());
                    $pays->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Pays:update_pays.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_paysAction($id)
    {
            $pays= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Pays')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $pays->setLogindelete($this->getUser()->getUsername());
                    $pays->setDatedelete(new \ Datetime());
                    $pays->setEstdelete(true);
                    $em->flush();
            }
            $element=$pays->getLibelle();
             return $this->render('BZVueBundle:Pays:delete_pays.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
