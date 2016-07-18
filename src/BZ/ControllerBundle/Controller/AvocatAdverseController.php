<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\AvocatAdverse;
use BZ\ModelBundle\Form\AvocatAdverseType;

class AvocatAdverseController extends Controller
{
    public function create_avocatadverseAction($id)
    {
            $affaire= $this->getDoctrine() ->getManager()->getRepository('BZModelBundle:Affaire')->find($id);
            $avocatadversaire = new AvocatAdverse;
            $avocatadversaire->setLoginpersist($this->getUser()->getUsername());
            $avocatadversaire->setDatepersist(new \ Datetime());
            $avocatadversaire->setEstdelete(false);
            $avocatadversaire->setAffaire($affaire);
            $form= $this->createForm(new AvocatAdverseType(), $avocatadversaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($avocatadversaire);
                    $em->flush();
                }
                    return $this->redirect( $this->generateUrl('ajouter_pieceaffaire', Array('id'=>$id)));
             }
             return $this->render('BZVueBundle:AvocatAdverse:create_avocatadverse.html.twig', 
                     array('menu_num' => 1, 'id' => $id,'affaire' => $affaire, 'form'   => $form->createView()));             
    }
    
    public function delete_avocatadverseAction($id)
    {
            $avocatadverse= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:AvocatAdverse')
                                      ->find($id);
            $affaire=$avocatadverse->getAffaire();
                    $em = $this->getDoctrine()->getManager();
                    $em->remove($avocatadverse);
                    $em->flush();
                 return $this->redirect( $this->generateUrl('ajouter_pieceaffaire', Array('id'=>$affaire->getId())));       
    }
    
}
