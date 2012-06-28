<?php

namespace MindsEyeSociety\LibraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AwardType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('earnedDate')
            ->add('type')
            ->add('category')
            ->add('amount')
            ->add('description')
            ->add('note')
            ->add('awardedDate')
            ->add('memberNumber')
        ;
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'MindsEyeSociety\LibraryBundle\Entity\Award'
        );
    }

    public function getName()
    {
        return 'award';
    }
}
