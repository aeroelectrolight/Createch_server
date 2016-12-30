<?php

namespace AppBundle\Form\Settings;

use libphonenumber\PhoneNumberFormat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' =>  'Le nom du lieu : ',
                'required'  => true,
            ))
            ->add('numero', IntegerType::class, array(
                'label' =>  'Le numero : ',
                'required'  => false,
            ))
            ->add('rue', TextType::class, array(
                'label' =>  'Le nom de la rue : ',
                'required'  => false,
            ))
            ->add('cPostal', TextType::class ,array(
                'label' =>  'Le code postal : ',
                'required'  => false,
            ))
            ->add('ville', TextType::class, array(
                'label' =>  'La ville : ',
                'required'  => true,
            ))
            ->add('telephone', PhoneNumberType::class, array(
                'default_region' => 'FR',
                'format' => PhoneNumberFormat::NATIONAL,
                'label' =>  'Le telephone : ',
                'required'  => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => FALSE,
            'data_class' => 'AppBundle\Entity\Settings\Lieu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_settings_lieu';
    }
}
