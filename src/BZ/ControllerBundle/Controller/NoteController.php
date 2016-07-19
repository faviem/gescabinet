<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\NoteRedigee;
use BZ\ModelBundle\Entity\PartagerNote;
use BZ\ModelBundle\Form\NoteRedigeeType;

class NoteController extends Controller
{
    public function create_noteAction()
    {
            $note= new NoteRedigee;
            $note->setEstdelete(false);
            $note->setEstarchivee(false);
            $note->setEstpubliee(false);
            $note->setAgent($this->getDoctrine() ->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>$this->getUser())));
            $note->setLoginpersist($this->getUser()->getUsername());
            $note->setDatepersist(new \ Datetime());
            $form = $this->createForm(new NoteRedigeeType(), $note); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($note);
                    $em->flush();
                    $partagenote = new PartagerNote;
                    $partagenote->setAgentexpediteur($note->getAgent());
                    $partagenote->setAgentdestinataire($note->getAgent());
                    $partagenote->setNoteredigee($note);
                    $partagenote->setEstdelete(false);
                     $partagenote->setEstarchivee($note->getEstarchivee());
                     $partagenote->setEstpubliee($note->getEstpubliee());
                      $partagenote->setDatepubliee($note->getDatepubliee());
                    $partagenote->setDatearchivee($note->getDatearchivee());
                    $partagenote->setLoginpersist($this->getUser()->getUsername());
                    $partagenote->setDatepersist(new \ Datetime());
                     $em->persist($partagenote);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('ajouter_piecenote', Array('id'=>$note->getId())));
                }
            }
             return $this->render('BZVueBundle:NoteRedigee:create_note.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_repertoirenoteAction()
    {
            $notes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NoteRedigee')
                                      ->findBy(Array('estarchivee'=>false,'estdelete'=>false, 'agent'=>$this->getDoctrine() ->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>$this->getUser()))),Array('datepersist'=>'ASC'));
             return $this->render('BZVueBundle:NoteRedigee:read_notenonpubliee.html.twig', 
                     array('menu_num' => 1, 'notes' => $notes));             
    }
    
    public function read_notearchiveeAction()
    {
            $notes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NoteRedigee')
                                      ->findBy(Array('estarchivee'=>true,'estdelete'=>false, 'agent'=>$this->getDoctrine() ->getManager()->getRepository('BZModelBundle:Agent')->findOneBy(Array('user'=>$this->getUser()))),Array('datearchivee'=>'ASC'));
             return $this->render('BZVueBundle:NoteRedigee:read_notearchivee.html.twig', 
                     array('menu_num' => 1, 'notes' => $notes));             
    }
    
    public function update_noteAction($id)
    {
            $note= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NoteRedigee')
                                      ->find($id);
            $form = $this->createForm(new NoteRedigeeType(), $note); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $note->setLoginpersist($this->getUser()->getUsername());
                    $note->setDatepersist(new \ Datetime());
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    return $this->redirect( $this->generateUrl('ajouter_piecenote', Array('id'=>$id)));
                }
            }
             return $this->render('BZVueBundle:NoteRedigee:update_note.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function publier_noteAction($id)
    {
            $note= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NoteRedigee')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $em = $this->getDoctrine()->getManager();
                    $note->setEstpubliee(true);
                    $note->setEstarchivee(false);
                    $note->setDatepubliee(new \ Datetime());
                    $note->setDatearchivee(null);
                    foreach ($note->getPartagernotes() as $i)
                    {
                      $i->setEstarchivee($note->getEstarchivee());
                      $i->setEstpubliee($note->getEstpubliee());
                      $i->setDatepubliee($note->getDatepubliee());
                      $i->setDatearchivee($note->getDatearchivee());
                    }
                    $em->flush();
             }
             return $this->render('BZVueBundle:NoteRedigee:publier_note.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'noteredigee' => $note ));             
    }
    
    public function depublier_noteAction($id)
    {
            $note= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NoteRedigee')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $em = $this->getDoctrine()->getManager();
                    $note->setEstpubliee(false);
                    $note->setEstarchivee(false);
                    $note->setDatepubliee(new \ Datetime());
                    $note->setDatearchivee(null);
                    foreach ($note->getPartagernotes() as $i)
                    {
                      $i->setEstarchivee($note->getEstarchivee());
                      $i->setEstpubliee($note->getEstpubliee());
                      $i->setDatepubliee($note->getDatepubliee());
                      $i->setDatearchivee($note->getDatearchivee());
                    }
                    $em->flush();
             }
             return $this->render('BZVueBundle:NoteRedigee:depublier_note.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'noteredigee' => $note ));             
    }
    
    public function archiver_noteAction($id)
    {
            $note= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NoteRedigee')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $em = $this->getDoctrine()->getManager();
                    $note->setEstpubliee(false);
                    $note->setEstarchivee(true);
                    $note->setDatearchivee(new \ Datetime());
                    foreach ($note->getPartagernotes() as $i)
                    {
                      $i->setEstarchivee($note->getEstarchivee());
                      $i->setEstpubliee($note->getEstpubliee());
                      $i->setDatepubliee($note->getDatepubliee());
                      $i->setDatearchivee($note->getDatearchivee());
                    }
                    $em->flush();
             }
             return $this->render('BZVueBundle:NoteRedigee:archiver_note.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'noteredigee' => $note ));             
    }
    
    public function delete_noteAction($id)
    {
            $note= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:NoteRedigee')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $note->setLogindelete($this->getUser()->getUsername());
                    $note->setDatedelete(new \ Datetime());
                    $note->setEstdelete(true);
                    foreach ($note->getPartagernotes() as $i){
                        $i->setLogindelete($this->getUser()->getUsername());
                        $i->setDatedelete(new \ Datetime());
                        $i->setEstdelete(true);
                    }
                    $em->flush();
            }
            $element=$note;
             return $this->render('BZVueBundle:NoteRedigee:delete_note.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'noteredigee' => $element ));             
    }
    
}
