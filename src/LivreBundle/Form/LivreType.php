<?php

namespace LivreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use LivreBundle\Form\GenreType;
use LivreBundle\Form\ImageType;

class LivreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('titre', TextType::class, array(
              'label' => 'titre : ',
              'required' => true,
          ))
          ->add('auteur', TextType::class, array(
              'label' => 'auteur : ',
              'required' => false,
          ))
          ->add('editeur', TextType::class, array(
              'label' => 'editeur : ',
              'required' => false,
          ))
          ->add('genres', EntityType::class, array(
              'label' => 'ajouter des genres : ',
              'class'        => 'LivreBundle:Genre',
              'choice_label' => 'nomgenre',
              'multiple'     => true,
              'required' => false,
          ))
          ->add('imageLivre', ImageType::class, array(
              'label'  => false,
              'required' => false,
          ))
          ->add('save', SubmitType::class, array('label' => 'ENVOYER'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LivreBundle\Entity\Livre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'livrebundle_livre';
    }


}
