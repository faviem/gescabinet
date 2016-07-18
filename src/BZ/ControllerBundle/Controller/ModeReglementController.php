<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\ModeReglement;
use BZ\ModelBundle\Form\ModeReglementType;

class ModeReglementController extends Controller
{
    public function create_modereglementAction()
    {
            $modereglement= new ModeReglement;
            $modereglement->setEstdelete(false);
            $modereglement->setLoginpersist($this->getUser()->getUsername());
            $modereglement->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ModeReglementType(), $modereglement); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($modereglement);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:ModeReglement:create_modereglement.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_modereglementAction()
    {
            $modereglements= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ModeReglement')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:ModeReglement:read_modereglement.html.twig', 
                     array('menu_num' => 1, 'modereglements' => $modereglements));             
    }
    
    public function update_modereglementAction($id)
    {
            $modereglement= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ModeReglement')
                                      ->find($id);
            $form = $this->createForm(new ModeReglementType(), $modereglement); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $modereglement->setLoginpersist($this->getUser()->getUsername());
                    $modereglement->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:ModeReglement:update_modereglement.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_modereglementAction($id)
    {
            $modereglement= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ModeReglement')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $modereglement->setLogindelete($this->getUser()->getUsername());
                    $modereglement->setDatedelete(new \ Datetime());
                    $modereglement->setEstdelete(true);
                    $em->flush();
            }
            $element=$modereglement->getLibelle();
             return $this->render('BZVueBundle:ModeReglement:delete_modereglement.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
