<?php

namespace AppBundle\Form\Settings;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WorktimeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('timeclock', DateTimeType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd HH:mm'
        ))
            ->add('direction')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => FALSE,
            'data_class' => 'AppBundle\Entity\Settings\Worktime'
        ));
    }
}
