<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Juridiction;
use BZ\ModelBundle\Form\JuridictionType;

class JuridictionController extends Controller
{
    public function create_juridictionAction()
    {
            $juridiction= new Juridiction;
            $juridiction->setEstdelete(false);
            $juridiction->setLoginpersist($this->getUser()->getUsername());
            $juridiction->setDatepersist(new \ Datetime());
            $form = $this->createForm(new JuridictionType(), $juridiction); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($juridiction);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Juridiction:create_juridiction.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_juridictionAction()
    {
            $juridictions= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Juridiction')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:Juridiction:read_juridiction.html.twig', 
                     array('menu_num' => 1, 'juridictions' => $juridictions));             
    }
    
    public function update_juridictionAction($id)
    {
            $juridiction= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Juridiction')
                                      ->find($id);
            $form = $this->createForm(new JuridictionType(), $juridiction); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $juridiction->setLoginpersist($this->getUser()->getUsername());
                    $juridiction->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Juridiction:update_juridiction.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_juridictionAction($id)
    {
            $juridiction= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Juridiction')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $juridiction->setLogindelete($this->getUser()->getUsername());
                    $juridiction->setDatedelete(new \ Datetime());
                    $juridiction->setEstdelete(true);
                    $em->flush();
            }
            $element=$juridiction->getLibelle();
             return $this->render('BZVueBundle:Juridiction:delete_juridiction.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
