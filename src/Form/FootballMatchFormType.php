<?php

namespace App\Form;

use App\Entity\FootballMatch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FootballMatchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matchDate',DateType::class,)
            ->add('hourStart',TimeType::class,)
            ->add('hourFinish',TimeType::class,)
            ->add('statut',TextType::class)
            ->add('weather',TextType::class)
            ->add('scoreGame', NumberType::class)
            ->add('comments',TextType::class,)
            ->add('team1')
            ->add('team2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FootballMatch::class,
        ]);
    }
}
