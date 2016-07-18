<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Exercice;
use BZ\ModelBundle\Form\ExerciceType;

class ExerciceController extends Controller
{
    public function create_exerciceAction()
    {
            $exercice= new Exercice;
            $exercice->setEstdelete(false);
            $exercice->setLoginpersist($this->getUser()->getUsername());
            $exercice->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ExerciceType(), $exercice); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($exercice);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Exercice:create_exercice.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_exerciceAction()
    {
            $exercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('annee'=>'ASC'));
             return $this->render('BZVueBundle:Exercice:read_exercice.html.twig', 
                     array('menu_num' => 1, 'exercices' => $exercices));             
    }
    
    public function update_exerciceAction($id)
    {
            $exercice= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->find($id);
            $form = $this->createForm(new ExerciceType(), $exercice); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $exercice->setLoginpersist($this->getUser()->getUsername());
                    $exercice->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Exercice:update_exercice.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_exerciceAction($id)
    {
            $exercice= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $exercice->setLogindelete($this->getUser()->getUsername());
                    $exercice->setDatedelete(new \ Datetime());
                    $exercice->setEstdelete(true);
                    $em->flush();
            }
            $element=$exercice->getAnnee();
             return $this->render('BZVueBundle:Exercice:delete_exercice.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
}
