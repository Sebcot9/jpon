<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType as AbstractType;
#use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom');
        $builder->add('prenom');
        $builder->add('dateNaissance',DateType::class,array('format' => 'dd MM yyyy',
            'years'=>range(1901,2002)));
        parent::buildForm($builder, $options);

        //$builder->add('addresse', Entity::class);
    }

    /**
     * {@inheritdoc}
     */
    /*public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\Adresse'
        ));
    }
    */
    public function getParent() {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
    
    public function getBlockPrefix() {
        return 'app_user_registration';
    }

    public function getName() {
        return 'app_user_registration';
    }

}
