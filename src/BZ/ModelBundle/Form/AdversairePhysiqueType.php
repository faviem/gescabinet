<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\UserBundle\Form\UserAddType;
use Doctrine\ORM\EntityRepository;

class AdversairePhysiqueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
            'label' => 'Nom de la partie adverse (*)',
             'required' => true,
             'attr' =>array(
            'class' =>'form-control'
              )))
           ->add('telmobile', 'text', array(
                    'label' => 'Contact(s) de la partie adverse',
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
           ->add('email', 'text', array(
                    'label' => 'Adresse électronique de la partie adverse',
               'required' => false,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
           ->add('bp', 'text', array(
                    'label' => 'Boîte postale de la partie adverse',
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
                'attr' =>array('class' =>'form-control'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('v')
                                          ->orderBy('v.nomville', 'ASC')
                                          ->where('v.estdelete = 0');
                        }))
          ->add('adresserue', 'text', array(
                    'label' => 'Adresse de localité de la partie adverse',
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
            'data_class' => 'BZ\ModelBundle\Entity\AdversairePhysique'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_adversairephysique';
    }
}
