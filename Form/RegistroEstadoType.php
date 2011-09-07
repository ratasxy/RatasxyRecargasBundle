<?php

namespace Ratasxy\RecargasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RegistroEstadoType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('estado', 'choice', array(
                    'choices' => array(0 => 'Pendiente', 1 => 'Cancelado'))
                )
        ;
    }

    public function getName() {
        return 'ratasxy_recargasbundle_registrotype';
    }

}
