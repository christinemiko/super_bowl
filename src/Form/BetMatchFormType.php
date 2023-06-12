<?php

namespace App\Form;

use App\Entity\Sportbet;
use App\Entity\Team;
use App\Repository\TeamRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BetMatchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('team',EntityType::class,[
                'class'=> Team:: class,
                'choice_label' => function(Team $team) {
                    return $team->getTeamName();
                },
                'label' => ' Equipe : '])

            ->add('wagerMade', NumberType::class, [ 'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Montant en €',
                ],
                'label' => 'Veuillez indiquer le montant de la Mise: '])

            ->add('datewagerMade',DateType::class, [

                'widget' => 'single_text',
                'html5' => false,
                'label' => ' Date de la Mise: ' ,
                'attr' => [
                    'class' => 'flatpickr-date',
                ],
                'format' => 'yyyy-MM-dd',
            ])
            ;


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sportbet::class,
        ]);
    }
}
