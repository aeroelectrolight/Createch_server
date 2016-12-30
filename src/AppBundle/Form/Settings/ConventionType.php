<?php

namespace AppBundle\Form\Settings;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConventionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label'  => 'Nom de la convention : ',
            ))
            ->add('tpsMaxJ', NumberType::class, array(
                'label'  => 'Temps maximum par jour en heures : ',
            ))
            ->add('tpsMaxPeriode', NumberType::class, array(
                'label'  => 'Temps maximum par période de travail en heures : ',
            ))
            ->add('ampMaxJ', NumberType::class, array(
                'label'  => 'Amplitude maximum par jour en heures : ',
            ))
            ->add('tpsMinJ', NumberType::class, array(
                'label'  => 'Temp minimum par jour en heures : ',
            ))
            ->add('tpsMinInterPeriode', NumberType::class, array(
                'label'  => 'Temps minimum entre deux période en heures : ',
            ))
            ->add('tpsMinRepo', NumberType::class, array(
                'label'  => 'Temps minimum de repo sans compensation entre 2 jours de travail en heures : ',
            ))
            ->add('tpsMinRepoComp', NumberType::class, array(
                'label'  => 'Temps minimum de repo avec compensation( heure de recuperation ) entre 2 jours de travail en heures : ',
            ))
            ->add('tpsMaxS', NumberType::class, array(
                'label'  => 'Nombre maximum d\'heures de travail sur une semaine : ',
            ))
            ->add('tpsMax12s', NumberType::class, array(
                'label'  => 'Nombre maximum d\'heures de travail sur douze semaine consécutive : ',
            ))
            ->add('nbrJMaxConse', NumberType::class, array(
                'label'  => 'Nombre maximum de jour de travail consecutif : ',
            ))
            ->add('tpsRepoHebdo', NumberType::class, array(
                'label'  => 'Temps de repo hebdomadaire en heures : ',
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
            'data_class' => 'AppBundle\Entity\Settings\Convention'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_settings_convention';
    }
}
