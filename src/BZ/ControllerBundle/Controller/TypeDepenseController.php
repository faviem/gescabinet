<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\TypeDepense;
use BZ\ModelBundle\Form\TypeDepenseType;

class TypeDepenseController extends Controller
{
    public function create_typedepenseAction()
    {
            $typedepense= new TypeDepense;
            $typedepense->setEstdelete(false);
            $typedepense->setLoginpersist($this->getUser()->getUsername());
            $typedepense->setDatepersist(new \ Datetime());
            $form = $this->createForm(new TypeDepenseType(), $typedepense); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($typedepense);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:TypeDepense:create_typedepense.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_typedepenseAction()
    {
            $typedepenses= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TypeDepense')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:TypeDepense:read_typedepense.html.twig', 
                     array('menu_num' => 1, 'typedepenses' => $typedepenses));             
    }
    
    public function update_typedepenseAction($id)
    {
            $typedepense= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TypeDepense')
                                      ->find($id);
            $form = $this->createForm(new TypeDepenseType(), $typedepense); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $typedepense->setLoginpersist($this->getUser()->getUsername());
                    $typedepense->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:TypeDepense:update_typedepense.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_typedepenseAction($id)
    {
            $typedepense= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TypeDepense')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $typedepense->setLogindelete($this->getUser()->getUsername());
                    $typedepense->setDatedelete(new \ Datetime());
                    $typedepense->setEstdelete(true);
                    $em->flush();
            }
            $element=$typedepense->getLibelle();
             return $this->render('BZVueBundle:TypeDepense:delete_typedepense.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
