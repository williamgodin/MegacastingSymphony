<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ...
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('email', TextareaType::class)
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Homme' => 1,
                    'Femme' => 2,
                ],
            ])
            ->add('applicationDate', DateType::class)
            ->add('birthDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Postuler'])


        ;


    }

    // ...
}