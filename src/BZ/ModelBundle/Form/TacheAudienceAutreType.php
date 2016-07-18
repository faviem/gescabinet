<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class TacheAudienceAutreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                   
            ->add('conclusion', 'textarea', array(
            'label' => 'Entrer la conclusion (décision) du jury',
             'attr' =>array(
            'class' =>'form-control'
            )))
                                
          ->add('observation', 'textarea', array(
            'label' => 'Entrer l\'observation',
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
