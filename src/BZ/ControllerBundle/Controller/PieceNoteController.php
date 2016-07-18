<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\PieceNote;
use BZ\ModelBundle\Form\PieceNoteType;

class PieceNoteController extends Controller
{
    public function ajouter_piecenoteAction($id)
    {
           $note= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NoteRedigee')->find($id);
            $piecenote= new PieceNote;
            $piecenote->setNoteredigee($note);
            $piecenote->setDateEnregistrement(new \ Datetime());
            $form = $this->createForm(new PieceNoteType(), $piecenote); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($piecenote);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('ajouter_piecenote', Array('id'=>$id)));
                }
            }
             return $this->render('BZVueBundle:PieceNote:create_piecenote.html.twig', 
                     array('menu_num' => 1, 'id' => $id,'noteredigee' => $note, 'form'   => $form->createView()));             
    }
    
    public function delete_piecenoteAction($id)
    {
            $piecenote= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:PieceNote')
                                      ->find($id);
            $note=$piecenote->getNoteredigee();
                    $em = $this->getDoctrine()->getManager();
                    $em->remove($piecenote);
                    $em->flush();
                 return $this->redirect( $this->generateUrl('ajouter_piecenote', Array('id'=>$note->getId())));       
    }
    
}
