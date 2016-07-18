<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\CategorieNote;
use BZ\ModelBundle\Form\CategorieNoteType;

class CategorieNoteController extends Controller
{
    public function create_categorienoteAction()
    {
            $categorienote= new CategorieNote;
            $categorienote->setEstdelete(false);
            $categorienote->setLoginpersist($this->getUser()->getUsername());
            $categorienote->setDatepersist(new \ Datetime());
            $form = $this->createForm(new CategorieNoteType(), $categorienote); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($categorienote);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:CategorieNote:create_categorienote.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_categorienoteAction()
    {
            $categorienotes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:CategorieNote')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:CategorieNote:read_categorienote.html.twig', 
                     array('menu_num' => 1, 'categorienotes' => $categorienotes));             
    }
    
    public function update_categorienoteAction($id)
    {
            $categorienote= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:CategorieNote')
                                      ->find($id);
            $form = $this->createForm(new CategorieNoteType(), $categorienote); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $categorienote->setLoginpersist($this->getUser()->getUsername());
                    $categorienote->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:CategorieNote:update_categorienote.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_categorienoteAction($id)
    {
            $categorienote= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:CategorieNote')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $categorienote->setLogindelete($this->getUser()->getUsername());
                    $categorienote->setDatedelete(new \ Datetime());
                    $categorienote->setEstdelete(true);
                    $em->flush();
            }
            $element=$categorienote->getLibelle();
             return $this->render('BZVueBundle:CategorieNote:delete_categorienote.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
