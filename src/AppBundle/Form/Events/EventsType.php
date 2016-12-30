<?php

namespace AppBundle\Form\Events;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use AppBundle\Form\Events\CoordonneesType;
use AppBundle\Form\Events\HorairesType;
use AppBundle\Form\Events\RepasType;
use AppBundle\Form\Events\BudgetsType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Titre : ',
            ))
            ->add('bgColor', EntityType::class, array(
                'class' => 'AppBundle:Settings\Couleur',
                'choice_label' => 'title',
                'multiple' => false,
                'label' => 'Couleur de l\'évenement : ',
            ))
            ->add('startDatetime', DateTimeType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd HH:mm',
                'label' => 'Date et heure de début : ',
            ))
            ->add('endDatetime', DateTimeType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd HH:mm',
                'label' => 'Date et heure de fin : ',
            ))
            ->add('allDay', CheckboxType::class, array(
                'required' => false,
                'label' => 'Jour entier : ',
            ))
            ->add('lieu', EntityType::class, array(
                'class' => 'AppBundle:Settings\Lieu',
                'choice_label' => 'title',
                'multiple' => false,
                'label' => 'Lieu de l\'évenement : ',
            ))
            ->add('coordonnees', CollectionType::class, array(
                // form[emails][2]
                'entry_type'          => CoordonneesType::class,
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
                'label'         => 'Contacts : ',
            ))
            ->add('horaires', CollectionType::class, array(
                'entry_type'          => HorairesType::class,
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
                'label'         => 'Horaire des transports : ',
            ))
            ->add('planning', TextareaType::class, array(
                'label'         => 'Planning de la journée : ',
            ))
            ->add('repas', CollectionType::class, array(
                'entry_type'  => RepasType::class,
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
                'label'         => 'Repas : ',
            ))
            ->add('divers', TextareaType::class, array(
                'label'         => 'Autres informations : ',
            ))
            ->add('budgets', CollectionType::class, array(
                'entry_type'  => BudgetsType::class,
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
                'label'         => 'Budget : ',
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
            'data_class' => 'AppBundle\Entity\Events\Events'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_events_events';
    }
}
