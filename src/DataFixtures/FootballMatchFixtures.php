<?php

namespace App\DataFixtures;

use App\Entity\FootballMatch;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class FootballMatchFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [
            TeamFixtures::class,
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
        /* FIXTURE MATCHES IN PROGRESS START */

        for ($i =0; $i < 5; $i++) {

            $footballMatch = new FootballMatch();

            $startDate = new \DateTime('2023-06-01');
            $endDate = new \DateTime('2023-12-31');
            $footballMatch->setMatchDate($this->faker->dateTimeBetween($startDate, $endDate));

            $hourStart = $this->faker->dateTimeBetween('10:00:00', '20:00:00');
            $hourFinish = $this->faker->dateTimeBetween('10:00:00', '20:00:00');
            $footballMatch->setHourStart($hourStart);
            $footballMatch->setHourFinish($hourFinish);

            $footballMatch->setStatut('En cours');

            $teamReference = 'team' . $this->faker->numberBetween(1, 32);
            $footballMatch->setTeam1($this->getReference($teamReference));

            $teamReference2 = 'team' . $this->faker->numberBetween(1, 32);
            $footballMatch->setTeam2($this->getReference($teamReference2));

            $weatherConditions1 = [
                'Ensoleillé avec ciel dégagé',
                'Nuageux avec risque de pluie',
                'Pluie légère',
                'Orageux avec éclairs',
                'Temps brumeux',
                'Vent fort',
                'Temps doux et ensoleillé',
            ];

            $weatherDescription = $this->faker->randomElement($weatherConditions1);
            $footballMatch->setWeather($weatherDescription);

            $footballMatch-> setScoreGame($this->faker->numberBetween(0, 40) . '_' . $this->faker->numberBetween(0, 40));

            $footballMatch->setComments('Le match est surprenant avec ces deux équipes et la fin du match se prononce très serré.');
            $manager->persist($footballMatch);
        }
        /* FIXTURE MATCHES IN PROGRESS END*/

        /* FIXTURES MATCHES FINISHED START*/
        for ($i =0; $i < 5; $i++) {

            $footballMatch = new FootballMatch();

            $startDate = new \DateTime('2023-01-01');
            $endDate = new \DateTime('2023-06-01');
            $footballMatch->setMatchDate($this->faker->dateTimeBetween($startDate, $endDate));

            $hourStart = $this->faker->dateTimeBetween('10:00:00', '20:00:00');
            $hourFinish = $this->faker->dateTimeBetween('10:00:00', '20:00:00');
            $footballMatch->setHourStart($hourStart);
            $footballMatch->setHourFinish($hourFinish);

            $footballMatch->setStatut('Terminé');

            $teamReference = 'team' . $this->faker->numberBetween(1, 32);
            $footballMatch->setTeam1($this->getReference($teamReference));

            $teamReference2 = 'team' . $this->faker->numberBetween(1, 32);
            $footballMatch->setTeam2($this->getReference($teamReference2));

            $weatherConditions2 = [
                'Ensoleillé avec ciel dégagé',
                'Nuageux avec risque de pluie',
                'Pluie légère',
                'Orageux avec éclairs',
                'Temps brumeux',
                'Vent fort',
                'Temps doux et ensoleillé',
            ];

            $weatherDescription = $this->faker->randomElement($weatherConditions2);
            $footballMatch->setWeather($weatherDescription);


            $footballMatch-> setScoreGame($this->faker->numberBetween(0, 40) . '_' . $this->faker->numberBetween(0, 40));

            $footballMatch->setComments('Ce fut un très beau Match, pleins de rebondissements, avec les grands favoris de la NLF.' );
            $manager->persist($footballMatch);
        }
        /* FIXTURES MATCHES FINISHED END*/

        /* FIXTURES MATCHES COMING START*/
        for ($i =0; $i < 5; $i++) {

            $footballMatch = new FootballMatch();

            $startDate = new \DateTime('2023-07-01');
            $endDate = new \DateTime('2024-12-01');
            $footballMatch->setMatchDate($this->faker->dateTimeBetween($startDate, $endDate));

            $hourStart = $this->faker->dateTimeBetween('10:00:00', '20:00:00');
            $hourFinish = $this->faker->dateTimeBetween('10:00:00', '20:00:00');
            $footballMatch->setHourStart($hourStart);
            $footballMatch->setHourFinish($hourFinish);

            $footballMatch->setStatut('Prochainement');

            $teamReference = 'team' . $this->faker->numberBetween(1, 32);
            $footballMatch->setTeam1($this->getReference($teamReference));

            $teamReference2 = 'team' . $this->faker->numberBetween(1, 32);
            $footballMatch->setTeam2($this->getReference($teamReference2));

            $weatherConditions2 = [
                'Ensoleillé avec ciel dégagé',
                'Nuageux avec risque de pluie',
                'Pluie légère',
                'Orageux avec éclairs',
                'Temps brumeux',
                'Vent fort',
                'Temps doux et ensoleillé',
            ];

            $weatherDescription = $this->faker->randomElement($weatherConditions2);
            $footballMatch->setWeather($weatherDescription);


            $footballMatch-> setScoreGame($this->faker->numberBetween(0, 40) . '_' . $this->faker->numberBetween(0, 40));

            $footballMatch->setComments('C/est un match attendu pour cette saison avec des équipes, prêtes pour la victoire.');
            $manager->persist($footballMatch);
        }


        /* FIXTURES MATCHES COMING END*/

        $manager->flush();
    }
}
