<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\PartagerNote;

class PartagerNoteController extends Controller
{
    public function create_partagernoteAction($id)
    {
            $note= $this->getDoctrine() ->getManager()->getRepository('BZModelBundle:NoteRedigee')->find($id);
            $membres = $this->getDoctrine() ->getManager()->getRepository('BZModelBundle:Agent')
                    ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC','prenom'=>'ASC'));
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    foreach ($_POST['bz_membre']  as $i){
                        $membrepartage = $this->getDoctrine() ->getManager()->getRepository('BZModelBundle:PartagerNote')
                                           ->findOneBy(Array('agentexpediteur'=>  $this->getUser()->getId(), 'agentdestinataire'=>  $i,  'noteredigee'=>  $id));
                        if($membrepartage == null){
                              $partagenote = new PartagerNote;
                              $partagenote->setAgentexpediteur($note->getAgent());
                              $partagenote->setAgentdestinataire($this->getDoctrine() ->getManager()->getRepository('BZModelBundle:Agent')->find($i));
                               $partagenote->setNoteredigee($note);
                               $partagenote->setEstdelete(false);
                               $partagenote->setEstarchivee($note->getEstarchivee());
                               $partagenote->setEstpubliee($note->getEstpubliee());
                               $partagenote->setDatepubliee($note->getDatepubliee());
                                $partagenote->setDatearchivee($note->getDatearchivee());
                                $partagenote->setLoginpersist($this->getUser()->getUsername());
                                $partagenote->setDatepersist(new \ Datetime());
                              $em->persist($partagenote);
                        }
                    }
                   $em->flush();
                    return $this->redirect( $this->generateUrl('ajouter_piecenote', Array('id'=>$id)));
             }
             return $this->render('BZVueBundle:PartagerNote:create_partagernote.html.twig', 
                     array('menu_num' => 1, 'id' => $id,'noteredigee' => $note, 'membres' => $membres));             
    }
    
   public function read_partagernoteAction()
    {
            $notes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:PartagerNote')
                                      ->findBy(Array('estarchivee'=>false,'estdelete'=>false, 'estpubliee'=>true, 'agentdestinataire'=>$this->getDoctrine() ->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>$this->getUser()))),Array('datepubliee'=>'ASC'));
             return $this->render('BZVueBundle:PartagerNote:read_partagernote.html.twig', 
                     array('menu_num' => 1, 'notes' => $notes));             
    }
    
    public function delete_partagernoteAction($id)
    {
            $partagernote= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:PartagerNote')
                                      ->find($id);
            $note=$partagernote->getNoteRedigee();
                    $em = $this->getDoctrine()->getManager();
                    $em->remove($partagernote);
                    $em->flush();
                 return $this->redirect( $this->generateUrl('ajouter_piecenote', Array('id'=>$note->getId())));       
    }
    
}
