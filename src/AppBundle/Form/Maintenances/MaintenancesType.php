<?php

namespace AppBundle\Form\Maintenances;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaintenancesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('dateOrigin', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ))
            ->add('dateVisit', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ))
            ->add('dateWork', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ))
            ->add('dateResolved', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ))
            ->add('description')
            ->add('category')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => FALSE,
            'data_class' => 'AppBundle\Entity\Maintenances\Maintenances'
        ));
    }
}
