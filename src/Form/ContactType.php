<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class ContactType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name', TextType::class)
      ->add('email', EmailType::class)
      ->add('message', TextareaType::class)
    ;
  }
  public function configureOptions(OptionsResolver $resolver) {}
  public function getBlockPrefix(): string
  {
    return 'contact';
  }
  /*$builder
      ->add('name', TextType::class, [
        'label' => 'Votre Nom',
        'attr' => [
          'class' => 'form-control',
          'placeholder' => 'Entrez votre nom'
        ],
        'constraints' => [
          new NotBlank(['message' => 'Le nom est requis']),
          new Length(['min' => 2, 'max' => 50])
        ]
      ])
      ->add('email', EmailType::class, [
        'label' => 'Votre Email',
        'attr' => [
          'class' => 'form-control',
          'placeholder' => 'Entrez votre email'
        ],
        'constraints' => [
          new NotBlank(['message' => 'L\'email est requis']),
          new Email(['message' => 'Veuillez entrer un email valide'])
        ]
      ])
      ->add('message', TextareaType::class, [
        'label' => 'Message',
        'attr' => [
          'class' => 'form-control',
          'rows' => 5,
          'placeholder' => 'Écrivez votre message ici'
        ],
        'constraints' => [
          new NotBlank(['message' => 'Le message ne peut pas être vide']),
          new Length(['min' => 10, 'max' => 1000])
        ]
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => null, // Remplacez par une entité si nécessaire
    ]);
  }

  public function getBlockPrefix(): string
  {
    return 'contact';
  }*/
}
