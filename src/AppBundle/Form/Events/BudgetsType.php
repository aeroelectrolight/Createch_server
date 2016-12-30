<?php

namespace AppBundle\Form\Events;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BudgetsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('compte')
            ->add('nature')
            ->add('nom')
            ->add('detail')
            ->add('provisionalAmount')
            ->add('realAmount')
            ->add('estimatedHours')
            ->add('realHours')
            ->add('type')
            ->add('tarifh')
            ->add('events', EntityType::class, array(
                'class'     => 'AppBundle:Events\Events',
                'choice_label' => 'title',
                'multiple'      => false,
                'error_bubbling' => false
                ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'AppBundle\Entity\Events\Budgets'
        ));
    }
}
