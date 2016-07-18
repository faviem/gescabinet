<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class TacheAffaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
            ->add('agentdestinataire','entity', array('label' => 'Affecter le dossier à :  ', 
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
          ->add('note', 'textarea', array(
            'label' => 'Rédiger une note sur la tâche',
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
            'data_class' => 'BZ\ModelBundle\Entity\TacheAffaire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_tacheaffaire';
    }
}
