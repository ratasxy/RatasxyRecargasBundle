<?php

namespace Ratasxy\RecargasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PagosType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('monto')
            ->add('tipo', 'choice', array(
                    'choices' => array(0 => 'Claro', 1 => 'Recaudadora'))
                )
            ->add('codigo')
            ->add('estado', 'choice', array(
                    'choices' => array(0 => 'Pendiente', 1 => 'Cancelado'))
                )
        ;
    }

    public function getName()
    {
        return 'ratasxy_recargasbundle_pagostype';
    }
}
