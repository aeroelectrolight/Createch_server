<?php

namespace AppBundle\Form\Events;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HorairesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'choices'   => array(
                    'arrivée'   => 'Arrivée',
                    'départ'    => 'Départ'),
                'required'  => false,
                'label'         => 'Type : ',
            ))
            ->add('personne', TextType::class, array(
                'label'         => 'Nom de la personne : ',
            ))
            ->add('transport', TextType::class,array(
                'label'         => 'Transport : ',
            ))
            ->add('lieu', TextType::class, array(
                'label'         => 'Lieu : ',
            ))
            ->add('horaire', TimeType::class, array(
                'label'         => 'Horaire : ',
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Events\Horaires'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_events_horaires';
    }
}
