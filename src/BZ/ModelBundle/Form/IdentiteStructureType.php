<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\UserBundle\Form\UserAddType;
use Doctrine\ORM\EntityRepository;

class IdentiteStructureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

           ->add('nomcabinet', 'text', array(
                    'label' => 'Nom du Cabinet',
                'required' => false,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
           ->add('raisonsociale', 'text', array(
                    'label' => 'Raison Sociale',
                'required' => false,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
           ->add('telcabinet', 'text', array(
                    'label' => 'Contact(s) du Cabinet',
                'required' => false,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
           ->add('emailcabinet', 'text', array(
                    'label' => 'Adresse électronique du Cabinet',
                'required' => false,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
           ->add('immatcabinet', 'text', array(
                    'label' => 'Immatriculation (IFU/RCCM) du Cabinet',
                'required' => false,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
                ->add('photopersonnel', new PhotoPersonnelType(),array('label' => 'Joindre logo du cabinet', 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\IdentiteStructure'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_identitestructure';
    }
}
