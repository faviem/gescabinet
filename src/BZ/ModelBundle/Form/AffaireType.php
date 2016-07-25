<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AffaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('exercice','entity', array('label' => 'Exercice', 
                'class' => 'BZModelBundle:Exercice',
                'property' => 'annee',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('e')
                                          ->orderBy('e.annee', 'ASC')
                                          ->where('e.estdelete = 0');
                        }))
            ->add('natureaffaire','entity', array('label' => 'Nature de l\'affaire', 
                'class' => 'BZModelBundle:NatureAffaire',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('n')
                                          ->orderBy('n.libelle', 'ASC')
                                          ->where('n.estdelete = 0');
                        }))
            ->add('juridiction','entity', array('label' => 'Juridiction', 
                'class' => 'BZModelBundle:Juridiction',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('j')
                                          ->orderBy('j.libelle', 'ASC')
                                          ->where('j.estdelete = 0');
                        }))
            ->add('qualiteaffaire','entity', array('label' => 'Qualité du client', 
                'class' => 'BZModelBundle:QualiteAffaire',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('j')
                                          ->orderBy('j.libelle', 'ASC')
                                          ->where('j.estdelete = 0');
                        }))
          ->add('dateaffaire', 'date', array(
                    'label' => 'Date du dossier',
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy',
                    'attr' => array('class' => 'date form-control '),
                ))
          ->add('numeroaffaire', 'text', array(
                    'label' => 'N° de procédure (*)',
                   'required' => true,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
          ->add('numerodosier', 'text', array(
                    'label' => 'N° du dossier (*)',
                   'required' => true,
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
//          ->add('objet', 'textarea', array(
//                    'label' => 'Objet du litige',
//                     'attr' =>array(
//                    'class' =>'form-control'
//                      )))
         ->add('objetlitige','entity', array('label' => 'Objet du litige', 
                'class' => 'BZModelBundle:ObjetLitige',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('o')
                                          ->orderBy('o.libelle', 'ASC')
                                          ->where('o.estdelete = 0');
                        }))
          ->add('coutouverture', 'number', array(
                    'label' => 'Frais d\'ouverture (francs CFA)',
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
          ->add('coutprocedure', 'number', array(
                    'label' => 'Frais de procédure (francs CFA)',
                     'attr' =>array(
                    'class' =>'form-control'
                      )))
          ->add('couthonoraire', 'number', array(
                    'label' => 'Honoraires (francs CFA)',
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
            'data_class' => 'BZ\ModelBundle\Entity\Affaire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_affaire';
    }
}
