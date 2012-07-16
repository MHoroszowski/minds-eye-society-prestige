<?php

namespace MindsEyeSociety\ReportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AwardType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('earned', 'date', array('widget' => 'choice', 'format' => 'yyyy / MM', 'years' => range(2003, date('Y'))))
            ->add('awarded', 'date', array('widget' => 'choice', 'format' => 'yyyy / MM', 'years' => range(2003, date('Y'))))
            ->add('value')
            ->add('type')
            ->add('category')
            ->add('description')
            ->add('note')
            ->add('receivingMember')
            ->add('approvingMember')
        ;
    }

    public function getName()
    {
        return 'mindseyesociety_reportbundle_awardtype';
    }
}
