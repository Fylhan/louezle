<?php

namespace LouezLe\RestApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class GenericDataType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('url')
            ->add('content')
            ->add('language')
            ->add('dateCreation')
            ->add('dateUpdate')
        ;
    }

    public function getName()
    {
        return 'louezle_restapibundle_genericdatatype';
    }
}
