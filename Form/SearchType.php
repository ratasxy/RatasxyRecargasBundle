<?php

namespace Ratasxy\RecargasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SearchType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('fecha', 'date');
                
        ;
    }

    public function getName() {
        return 'ratasxy_recargasbundle_fechatype';
    }

}
