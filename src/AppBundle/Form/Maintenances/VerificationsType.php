<?php

namespace AppBundle\Form\Maintenances;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class VerificationsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation', TextType::class)
            ->add('lastVisite', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ))
            ->add('nextVisite', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd'
            ))
            ->add('organism', TextType::class)
            ->add('alertDelay', IntegerType::class)
            ->add('periodicity', IntegerType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'AppBundle\Entity\Maintenances\Verifications'
        ));
    }
}
