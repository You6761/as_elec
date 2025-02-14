<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\emailClient;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Devis;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom'])
            ->add('prenom', TextType::class, ['label' => 'Prénom'])
            ->add('ville', TextType::class, ['label' => 'Ville'])
            ->add('adresse', TextType::class, ['label' => 'Adresse'])
            ->add('numero', NumberType::class, ['label' => 'Numéro de téléphone'])
            ->add('descriptionTravaux', TextareaType::class, [
                'label' => 'Descriptif des travaux'
            ])
            ->add('typeHabitat', ChoiceType::class, [
                'label' => 'Type de logement',
                'choices' => [
                    'Maison' => 'maison',
                    'Appartement' => 'appartement',
                    'Autre' => 'autre',
                ],
                'expanded' => true, // Afficher en boutons radio
            ])
            ->add('estimationTravaux', ChoiceType::class, [
                'label' => 'Estimation du temps des travaux',
                'choices' => [
                    '1 mois' => '1_mois',
                    '2 mois' => '2_mois',
                    'Préciser' => 'preciser',
                ],
            ])
            ->add('plusDeDetails', TextareaType::class, [
                'label' => 'Plus de détails (facultatif)',
                'required' => false
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}
