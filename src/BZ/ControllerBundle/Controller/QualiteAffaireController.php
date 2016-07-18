<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\QualiteAffaire;
use BZ\ModelBundle\Form\QualiteAffaireType;

class QualiteAffaireController extends Controller
{
    public function create_qualiteaffaireAction()
    {
            $qualiteaffaire= new QualiteAffaire;
            $qualiteaffaire->setEstdelete(false);
            $qualiteaffaire->setLoginpersist($this->getUser()->getUsername());
            $qualiteaffaire->setDatepersist(new \ Datetime());
            $form = $this->createForm(new QualiteAffaireType(), $qualiteaffaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($qualiteaffaire);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:QualiteAffaire:create_qualiteaffaire.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_qualiteaffaireAction()
    {
            $qualiteaffaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:QualiteAffaire')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:QualiteAffaire:read_qualiteaffaire.html.twig', 
                     array('menu_num' => 1, 'qualiteaffaires' => $qualiteaffaires));             
    }
    
    public function update_qualiteaffaireAction($id)
    {
            $qualiteaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:QualiteAffaire')
                                      ->find($id);
            $form = $this->createForm(new QualiteAffaireType(), $qualiteaffaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $qualiteaffaire->setLoginpersist($this->getUser()->getUsername());
                    $qualiteaffaire->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:QualiteAffaire:update_qualiteaffaire.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_qualiteaffaireAction($id)
    {
            $qualiteaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:QualiteAffaire')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $qualiteaffaire->setLogindelete($this->getUser()->getUsername());
                    $qualiteaffaire->setDatedelete(new \ Datetime());
                    $qualiteaffaire->setEstdelete(true);
                    $em->flush();
            }
            $element=$qualiteaffaire->getLibelle();
             return $this->render('BZVueBundle:QualiteAffaire:delete_qualiteaffaire.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
