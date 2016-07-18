<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\UserBundle\Form\UserAddType;
use Doctrine\ORM\EntityRepository;

class AgentAddType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
            'label' => 'Nom',
             'attr' =>array(
            'class' =>'form-control'
              )))
          ->add('prenom', 'text', array(
            'label' => 'Prénom(s)',
             'attr' =>array(
            'class' =>'form-control'
             )))
         ->add('sexe', 'choice', 
                    array(
                        'choices' => array(
                            'M' => 'Masculin',
                            'F' => 'Féminin'
                        ),
                        'label' => 'Sexe',
                        'required'    => true,
                        'attr' =>array('class' =>'form-control chzn-select'),
                        'empty_value' => '--Choisissez le sexe--',
                        'empty_data'  => null
                    ))
           ->add('telmobile', 'text', array(
                    'label' => 'Contact(s)',
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
                ->add('fonction', 'text', array(
                    'label' => 'Fonction',
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
            ->add('ville','entity', array('label' => 'Ville de résidence', 
                'class' => 'BZModelBundle:Ville',
                'property' => 'nomville',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('v')
                                          ->orderBy('v.nomville', 'ASC')
                                          ->where('v.estdelete = 0');
                        }))
          ->add('user', new UserAddType(),array('label' => false, 'required' => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\Agent'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_agent';
    }
}
