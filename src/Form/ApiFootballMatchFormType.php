<?php

namespace App\Form;

use App\Entity\FootballMatch;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\Types;

class ApiFootballMatchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matchDate', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
            ])
            ->add('hourStart', TimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
            ])
            ->add('hourFinish', TimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
            ])
            ->add('statut')
            ->add('weather')
            ->add('scoreGame')
            ->add('comments')

            ->add('team1', EntityType::class, [
                'class' => Team::class,
            ])
            ->add('team2', EntityType::class, [
                'class' => Team::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FootballMatch::class,
            'csrf_protection' => false, // désactive la protection CSRF
        ]);
    }
}
