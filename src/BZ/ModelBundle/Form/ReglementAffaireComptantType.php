<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\ModelBundle\Form\PieceReglementType;
use Doctrine\ORM\EntityRepository;

class ReglementAffaireComptantType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('datereglement', 'date', array(
                    'label' => 'Date Opération',
                    'widget' => 'single_text',
                    'input' => 'datetime',
                    'format' => 'dd/MM/yyyy',
                    'attr' => array('class' => 'date form-control '),
                ))
                ->add('modereglement', 'entity', array('label' => 'Mode de règlement',
                    'class' => 'BZModelBundle:ModeReglement',
                    'property' => 'libelle',
                    'empty_value' => '',
                    'multiple' => false,
                    'attr' => array('class' => 'form-control '),
                    'required' => true,
                    'query_builder' => function(EntityRepository $er ) {
                return $er->createQueryBuilder('m')
                        ->orderBy('m.libelle', 'ASC')
                        ->where('m.estdelete = 0');
            }))
                ->add('montantregelement', 'number', array(
                    'label' => 'Montant Réglé',
                    'attr' => array(
                        'class' => 'form-control'
            )))
           ->add('piecereglement', new PieceReglementType(),array('label' => 'Pièce Jointe', 'required' => false))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\ReglementAffaire'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'bz_modelbundle_reglementaffaire';
    }

}
