<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\ModelBundle\Form\PieceChargeType;
use Doctrine\ORM\EntityRepository;

class ChargeCabinetType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('datecharge', 'date', array(
                    'label' => 'Date Opération',
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy',
                    'attr' => array('class' => 'date form-control '),
                ))
                ->add('rubriquecharge', 'entity', array('label' => 'Rubrique Charge',
                    'class' => 'BZModelBundle:RubriqueCharge',
                    'property' => 'libelle',
                    'empty_value' => '',
                    'multiple' => false,
                    'attr' => array('class' => 'form-control chzn-select'),
                    'required' => true,
                    'query_builder' => function(EntityRepository $er ) {
                return $er->createQueryBuilder('r')
                        ->orderBy('r.libelle', 'ASC')
                        ->where('r.estdelete = 0');
            }))
                ->add('montantcharge', 'number', array(
                    'label' => 'Montant Opération',
                    'attr' => array(
                        'class' => 'form-control'
            )))
           ->add('piececharge', new PhotoPersonnelType(),array('label' => 'Pièce Jointe', 'required' => false))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\ChargeCabinet'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'bz_modelbundle_chargecabinet';
    }

}
