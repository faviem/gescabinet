<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class VilleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                  ->add('pays','entity', array('label' => 'Pays', 
                'class' => 'BZModelBundle:Pays',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('p')
                                          ->orderBy('p.libelle', 'ASC')
                                          ->where('p.estdelete = 0');
                        }))
            ->add('nomville', 'text', array(
            'label' => 'Ville',
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
            'data_class' => 'BZ\ModelBundle\Entity\Ville'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_ville';
    }
}
