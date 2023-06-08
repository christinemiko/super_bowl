<?php

namespace App\DataFixtures;

use App\Entity\FootballPlayer;
use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class FootballPlayerFixtures extends Fixture implements DependentFixtureInterface

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
       for ($i =0; $i < 40; $i++){
           $footballPlayer = new FootballPlayer();
           $footballPlayer->setLastName($this->faker->lastName());
           $footballPlayer->setFirstName($this->faker->firstNameMale());
           $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
           $footballPlayer->setOriginCountry($this->faker->country());
           $footballPlayer->setTeam($this->getReference('team1'));
           $manager->persist($footballPlayer);

       }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team2'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team3'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team4'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team5'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team6'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team7'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){

            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team8'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){

            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team9'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team10'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team11'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team12'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team13'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team14'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team15'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team16'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team17'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team18'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team19'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team20'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team21'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team22'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team23'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team24'));
            $manager->persist($footballPlayer);

        }

        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team25'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team26'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team27'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team28'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team29'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team30'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team31'));
            $manager->persist($footballPlayer);

        }
        for ($i =0; $i < 40; $i++){
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName($this->faker->lastName());
            $footballPlayer->setFirstName($this->faker->firstNameMale());
            $footballPlayer->setPlayerNumber($this->faker->numberBetween(0,70));
            $footballPlayer->setOriginCountry($this->faker->country());
            $footballPlayer->setTeam($this->getReference('team32'));
            $manager->persist($footballPlayer);

        }
        $manager->flush();
    }
}




