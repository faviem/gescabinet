<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\PieceAudience;
use BZ\ModelBundle\Form\PieceAudienceType;

class PieceAudienceController extends Controller
{
    public function ajouter_pieceaudienceAction($id)
    {
           $tacheaudience= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TacheAudience')->find($id);
            $pieceaudience= new PieceAudience;
            $pieceaudience->setTacheAudience($tacheaudience);
            $pieceaudience->setDateEnregistrement(new \ Datetime());
            $form = $this->createForm(new PieceAudienceType(), $pieceaudience); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($pieceaudience);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('ajouter_pieceaudience', Array('id'=>$id)));
                }
            }
             return $this->render('BZVueBundle:PieceAudience:create_pieceaudience.html.twig', 
                     array('menu_num' => 1, 'id' => $id,'tacheaudience' => $tacheaudience, 'form'   => $form->createView()));             
    }
    
    public function delete_pieceaudienceAction($id)
    {
            $pieceaudience= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:PieceAudience')
                                      ->find($id);
            $tacheaudience=$pieceaudience->getTacheAudience();
                    $em = $this->getDoctrine()->getManager();
                    $em->remove($pieceaudience);
                    $em->flush();
                 return $this->redirect( $this->generateUrl('ajouter_pieceaudience', Array('id'=>$tacheaudience->getId())));       
    }
    
}
