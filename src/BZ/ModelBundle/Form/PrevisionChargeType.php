<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PrevisionChargeType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                
                ->add('coutprevu', 'number', array(
                    'label' => 'Coût Prévisionnel',
                    'attr' => array(
                        'class' => 'form-control'
            )))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\PrevisionCharge'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'bz_modelbundle_previsioncharge';
    }

}
