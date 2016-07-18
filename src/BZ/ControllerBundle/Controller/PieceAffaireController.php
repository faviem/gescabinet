<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\PieceAffaire;
use BZ\ModelBundle\Form\PieceAffaireType;

class PieceAffaireController extends Controller
{
    public function ajouter_pieceaffaireAction($id)
    {
           $affaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Affaire')->find($id);
            $pieceaffaire= new PieceAffaire;
            $pieceaffaire->setAffaire($affaire);
            $pieceaffaire->setDateEnregistrement(new \ Datetime());
            $form = $this->createForm(new PieceAffaireType(), $pieceaffaire); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($pieceaffaire);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('ajouter_pieceaffaire', Array('id'=>$id)));
                }
            }
             return $this->render('BZVueBundle:PieceAffaire:create_pieceaffaire.html.twig', 
                     array('menu_num' => 1, 'id' => $id,'affaire' => $affaire, 'form'   => $form->createView()));             
    }
    
    public function delete_pieceaffaireAction($id)
    {
            $pieceaffaire= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:PieceAffaire')
                                      ->find($id);
            $affaire=$pieceaffaire->getNoteredigee();
                    $em = $this->getDoctrine()->getManager();
                    $em->remove($pieceaffaire);
                    $em->flush();
                 return $this->redirect( $this->generateUrl('ajouter_pieceaffaire', Array('id'=>$affaire->getId())));       
    }
    
}
