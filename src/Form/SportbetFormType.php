<?php

namespace App\Form;

use App\Entity\Sportbet;
use App\Entity\Team;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SportbetFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $team1 = $options['team1'];
        $team2 = $options['team2'];

        $builder
            ->add('wagerMade')
            ->add('dateWagerMade',DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
            ])
            ->add('team', EntityType::class, [
                'class' => Team::class,
                'query_builder' => function (EntityRepository $teamRepository) use ($team1, $team2) {
                    return $teamRepository->createQueryBuilder('t')
                        ->where('t = :team1 OR t = :team2')
                        ->setParameter('team1', $team1)
                        ->setParameter('team2', $team2)
                        ->orderBy('t.teamName');
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sportbet::class,
            'csrf_protection' => false,
            'team1' => null,
            'team2' => null,
        ]);
    }
}
