<?php

namespace AppBundle\Form\Events;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepasType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label'         => 'Groupe : ',
            ))
            ->add('nombre', NumberType::class, array(
                'label'         => 'Nombre de personne : ',
            ))
            ->add('horaire', TimeType::class, array(
                // hh:mm or hh:mm:ss
                'widget' => 'single_text',
                'label'         => 'Horaire : ',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Events\Repas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_events_repas';
    }
}
