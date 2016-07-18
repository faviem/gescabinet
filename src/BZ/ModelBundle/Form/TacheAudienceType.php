<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class TacheAudienceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('dateparticipee', 'date', array(
                    'label' => 'Date de Renvoi',
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy',
                    'attr' => array('class' => 'date form-control '),
                ))
                
            ->add('agentdestinataire','entity', array('label' => 'Affecter à :  ', 
                'class' => 'BZModelBundle:Agent',
                'property' => 'agentProfil',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('a')
                                          ->orderBy('a.nom', 'ASC')
                                          ->where('a.estdelete = 0');
                        }))
                        
            ->add('motif', 'textarea', array(
            'label' => 'Motif',
             'attr' =>array(
            'class' =>'form-control'
            )))
                                
          ->add('notedestinataire', 'textarea', array(
            'label' => 'Diligence',
             'attr' =>array(
            'class' =>'form-control'
            )))    
          
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\TacheAudience'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_tacheaudience';
    }
}
