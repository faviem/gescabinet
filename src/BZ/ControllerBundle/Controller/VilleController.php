<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Ville;
use BZ\ModelBundle\Form\VilleType;

class VilleController extends Controller
{
    public function create_villeAction()
    {
            $ville= new Ville;
            $ville->setEstdelete(false);
            $ville->setLoginpersist($this->getUser()->getUsername());
            $ville->setDatepersist(new \ Datetime());
            $form = $this->createForm(new VilleType(), $ville); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($ville);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Ville:create_ville.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_villeAction()
    {
            $villes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Ville')
                                      ->findBy(Array('estdelete'=>false),Array('nomville'=>'ASC'));
             return $this->render('BZVueBundle:Ville:read_ville.html.twig', 
                     array('menu_num' => 1, 'villes' => $villes));             
    }
    
    public function update_villeAction($id)
    {
            $ville= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Ville')
                                      ->find($id);
            $ville->setLoginpersist($this->getUser()->getUsername());
            $ville->setDatepersist(new \ Datetime());
            $form = $this->createForm(new VilleType(), $ville); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Ville:update_ville.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_villeAction($id)
    {
            $ville= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Ville')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $ville->setLogindelete($this->getUser()->getUsername());
                    $ville->setDatedelete(new \ Datetime());
                    $ville->setEstdelete(true);
                    $em->flush();
            }
            $element=$ville->getNomville();
             return $this->render('BZVueBundle:Ville:delete_ville.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
