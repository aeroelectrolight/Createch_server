<?php

namespace AppBundle\Form\Settings;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('couleur', EntityType::class , array(
                'class'     => 'AppBundle:Settings\Couleur',
                'multiple'      => false,
                'error_bubbling' => false
                ))
            ->add('fonctions', EntityType::class, array(
                'class'     => 'AppBundle:Settings\Fonction',
                'multiple'      => true,
                'error_bubbling' => false,
                'allow_extra_fields' => true
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
            'data_class' => 'AppBundle\Entity\Settings\Groupe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_settings_groupe';
    }
}
