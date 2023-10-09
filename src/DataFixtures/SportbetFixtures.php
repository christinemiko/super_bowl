<?php

namespace App\DataFixtures;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\FootballMatchFixtures;
use App\Entity\Sportbet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\FootballMatch;
use App\Entity\Team;
use App\Entity\User;
use Faker\Factory;
use Faker\Generator;

class SportbetFixtures extends Fixture implements DependentFixtureInterface
{

    public function getDependencies()
    {
        return [
            TeamFixtures::class,
            UserFixtures::class,
            FootballMatchFixtures::class,
        ];
    }
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Récupérez les utilisateurs, les équipes et les matchs de football existants
        $users = $manager->getRepository(User::class)->findAll();
        $teams = $manager->getRepository(Team::class)->findAll();
        $footballMatches = $manager->getRepository(FootballMatch::class)->findAll();


        foreach ($users as $user) {
           // Créez 5 Sportbet pour chaque utilisateur
            for ($i = 0; $i < 5; $i++) {
                $sportbet = new Sportbet();
                $sportbet->setWagerMade($faker->randomNumber(3))
                    ->setDateWagerMade(new \DateTime()) // définir la date d'aujourd'hui
                    ->setMoneyGain($faker->numberBetween($min = 100, $max = 999))
                    ->setUser($user)
                    ->setTeam($faker->randomElement($teams))
                    ->setFootballMatch($faker->randomElement($footballMatches))
                    ->setDeleted(false);

                $manager->persist($sportbet);
            }
        }
        $manager->flush();
    }


}
