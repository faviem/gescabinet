<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AvocatAdverseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
              ->add('nom', 'text', array(
            'label' => 'Nom de l\'avocat',
             'required' => true,
             'attr' =>array(
            'class' =>'form-control'
              )))
                 ->add('prenom', 'text', array(
            'label' => 'Prénom(s) de l\'avocat',
                      'required' => true,
             'attr' =>array(
            'class' =>'form-control'
             )))
           ->add('telmobile', 'text', array(
                    'label' => 'Contact(s) de l\'avocat',
               'required' => false,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
           ->add('email', 'text', array(
                    'label' => 'Adresse de l\'avocat',
               'required' => false,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
           ->add('bp', 'text', array(
                    'label' => 'Boîte postale de l\'avocat',
               'required' => false,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
        
            ->add('ville','entity', array('label' => 'Ville de résidence (*)', 
                'class' => 'BZModelBundle:Ville',
                'property' => 'nomville',
                'empty_value' => '',
                 'group_by' => 'parentName',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('v')
                                          ->orderBy('v.nomville', 'ASC')
                                          ->where('v.estdelete = 0');
                        }))
          ->add('adresserue', 'text', array(
                    'label' => 'Adresse de localité de l\'avocat',
                    'required' => false,
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
            'data_class' => 'BZ\ModelBundle\Entity\AvocatAdverse'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_avocatadverse';
    }
}
