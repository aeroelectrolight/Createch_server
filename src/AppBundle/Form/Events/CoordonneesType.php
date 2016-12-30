<?php

namespace AppBundle\Form\Events;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoordonneesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', ChoiceType::class, array(
                'choices' => array(
                    'Administrative' => 'Administrative',
                    'Technique' => 'Technique'),
                'required'          => false,
                'label'         => 'Type : ',
            ))
            ->add('nom', TextType::class, array(
                'label'         => 'Nom : ',
            ))
            ->add('prenom', TextType::class, array(
                'label'         => 'Prénom : ',
            ))
            ->add('telephone', PhoneNumberType::class, array(
                'default_region' => 'FR',
                'format' => PhoneNumberFormat::NATIONAL,
                'label' =>  'Le telephone : ',
                'required'  => false,
            ))
            ->add('mail', EmailType::class, array(
                'label'         => 'L\'adresse mail : ',
            ))
            ->add('fonction', TextType::class, array(
                'label' => 'La fonction :',
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Events\Coordonnees'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_events_coordonnees';
    }
}
