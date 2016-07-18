<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\NatureAffaire;
use BZ\ModelBundle\Form\NatureAffaireType;

class NatureAffaireController extends Controller
{
    public function create_natureaffaireAction()
    {
            $natureaffaire= new NatureAffaire;
            $natureaffaire->setEstdelete(false);
            $natureaffaire->setLoginpersist($this->getUser()->getUsername());
            $natureaffaire->setDatepersist(new \ Datetime());
            $form = $this->createForm(new NatureAffaireType(), $natureaffaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($natureaffaire);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:NatureAffaire:create_natureaffaire.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_natureaffaireAction()
    {
            $natureaffaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NatureAffaire')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:NatureAffaire:read_natureaffaire.html.twig', 
                     array('menu_num' => 1, 'natureaffaires' => $natureaffaires));             
    }
    
    public function update_natureaffaireAction($id)
    {
            $natureaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NatureAffaire')
                                      ->find($id);
            $form = $this->createForm(new NatureAffaireType(), $natureaffaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $natureaffaire->setLoginpersist($this->getUser()->getUsername());
                    $natureaffaire->setDatepersist(new \ Datetime());
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:NatureAffaire:update_natureaffaire.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_natureaffaireAction($id)
    {
            $natureaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NatureAffaire')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $natureaffaire->setLogindelete($this->getUser()->getUsername());
                    $natureaffaire->setDatedelete(new \ Datetime());
                    $natureaffaire->setEstdelete(true);
                    $em->flush();
            }
            $element=$natureaffaire->getLibelle();
             return $this->render('BZVueBundle:NatureAffaire:delete_natureaffaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
