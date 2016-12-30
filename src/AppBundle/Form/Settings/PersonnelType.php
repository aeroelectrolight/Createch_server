<?php
//
namespace AppBundle\Form\Settings;

use libphonenumber\PhoneNumberFormat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnelType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', TextType::class, array(
                'label'  => 'Le pseudonyme : ',
            ))
            ->add('nom', TextType::class, array(
                'label'  => 'Le nom : ',
            ))
            ->add('prenom', TextType::class, array(
                'label'  => 'Le prénom : ',
            ))
            ->add('mail', EmailType::class, array(
                'label'  => 'L\'adresse mail : ',
            ))
            ->add('statut', ChoiceType::class, array(
                'choices'   => array(
                    'intermittent'  => 'Intermittent', 
                    'permanent'     => 'Permanent',
                    'contractuel'   => 'Contractuel'),
                'required'  => true,
                'label'  => 'Le statut de la personne : ',
            ))
            ->add('dateNaissance', BirthdayType::class, array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'label'  => 'La date de naissance : ',
            ))
            ->add('lieuNaissance', TextType::class, array(
                'label'  => 'Le lieu de naissance : ',
                'required'  => false,
            ))
            ->add('telephone', PhoneNumberType::class, array(
                'default_region' => 'FR',
                'format' => PhoneNumberFormat::NATIONAL,
                'label' =>  'Le telephone : ',
                'required'  => false,
            ))
            ->add('numero', IntegerType::class, array(
                'label'  => 'Le numéro de la rue : ',
                'required'  => true,
            ))
            ->add('rue', TextType::class, array(
                'label'  => 'La rue : ',
                'required'  => true,
            ))
            ->add('cPostal', TextType::class, array(
                'label'  => 'Le code postal : ',
                'required'  => true,
            ))
            ->add('ville', TextType::class, array(
                'label'  => 'La ville : ',
                'required'  => true,
            ))
            ->add('numSecu', TextType::class, array(
                'label'  => 'Le numéro de sécurité social : ',
                'required'  => false,
            ))
            ->add('numConge', IntegerType::class, array(
                'label'  => 'Le numéro de congé spectacle : ',
                'required'  => false,
            ))
            ->add('rib', IntegerType::class, array(
                'label'  => 'Le relevé d\'identité bancaire : ',
                'required'  => false,
            ))
            ->add('convention', EntityType::class, array(
                'class'     => 'AppBundle:Settings\Convention',
                'multiple'      => false,
                'label'  => 'La convention : ',
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
            'data_class' => 'AppBundle\Entity\Settings\Personnel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_settings_personnel';
    }
}
