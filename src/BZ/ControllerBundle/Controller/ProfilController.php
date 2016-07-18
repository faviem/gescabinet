<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Profil;
use BZ\ModelBundle\Form\ProfilType;

class ProfilController extends Controller
{
    
    public function read_profilAction()
    {
            $profils= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Profil')
                                      ->findBy(Array(),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:Profil:read_profil.html.twig', 
                     array('menu_num' => 2, 'profils' => $profils));             
    }
    
    public function update_profilAction($id)
    {
            $profil= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Profil')
                                      ->find($id);
            $profil->setLoginpersist($this->getUser()->getUsername());
            $profil->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ProfilType(), $profil); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Profil:update_profil.html.twig', 
                     array('menu_num' => 2, 'form'   => $form->createView(),'id' => $id ));             
    }

}
