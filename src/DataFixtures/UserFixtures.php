<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;


class UserFixtures extends Fixture
{

    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr-FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i =0; $i < 10; $i++){
          $user = new User();
          $user->setLastName($this->faker->lastName());
          $user->setFirstName($this->faker->firstName());
          $user->setEmail($this->faker->email());
          $user->setPassword($this->faker->password());
          $user->setRoles(['ROLE_USER']);
          $user->setEnable(true);
            $manager->persist($user);

        }

        $user = new User();
        $user->setLastName('CHAU');
        $user->setFirstName('Christine');
        $user->setEmail('christinechau@gmail.com');
        $user->setPassword('$2y$10$wpNfCugEUnogBioPlbtbveYPVmhsx5hm8REUXfAY/MC516/DpvEf2');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEnable(true);

        $manager->persist($user);

        $user = new User();
        $user->setLastName('DUPONT');
        $user->setFirstName('Martin');
        $user->setEmail('martin@gmail.com');
        $user->setPassword('$2y$10$ZtZQWRK2xNC0eV0qbBxwV.PcAJPREurnS36BfFHf51dpF5rRdiDwy');
        $user->setRoles(['ROLE_SPORTSCASTER']);
        $user->setEnable(true);


        $manager->persist($user);

        $manager->flush();
    }
}
