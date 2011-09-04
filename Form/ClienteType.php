<?php

namespace Ratasxy\RecargasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('email')
            ->add('porcentaje')
        ;
    }

    public function getName()
    {
        return 'ratasxy_recargasbundle_clientetype';
    }
}
