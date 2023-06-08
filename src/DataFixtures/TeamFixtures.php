<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        /* TEAM START */

        $team = new Team();
        $team->setTeamName("49ers de San Francisco");
        $team->setOddsteam("1.56");
        $team->setRegionOrigin("San Francisco");
        $team->setLink("49ersdesanfrancisco.png");
        $this->addReference('team1', $team);
        $manager->persist($team);


        $team = new Team();
        $team->setTeamName("Bears de Chigaco");
        $team->setOddsteam("1.60");
        $team->setRegionOrigin("Chigaco");
        $team->setLink("bearsdechigaco.png");
        $this->addReference('team2', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Bengals de Cincinnati");
        $team->setOddsteam("2.15");
        $team->setRegionOrigin("Cincinnati");
        $team->setLink("bengalsdecincinnati.png");
        $this->addReference('team3', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Bills de Buffalo");
        $team->setOddsteam("1.49");
        $team->setRegionOrigin("New York");
        $team->setLink("billsdebuffalo.png");
        $this->addReference('team4', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Broncos de Denver");
        $team->setOddsteam("1.46");
        $team->setRegionOrigin("Denver");
        $team->setLink("broncosdedenver.png");
        $this->addReference('team5', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Browns de Cleveland");
        $team->setOddsteam("1.94");
        $team->setRegionOrigin("Cleveland");
        $team->setLink("brownsdecleveland.png");
        $this->addReference('team6', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Buccaneers de Tampabay");
        $team->setOddsteam("2.85");
        $team->setRegionOrigin("Floride");
        $team->setLink("buccanneersdetampabay.png");
        $this->addReference('team7', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Cardinals de l'Arizona");
        $team->setOddsteam("2.75");
        $team->setRegionOrigin("Arizona");
        $team->setLink("cardinalsdelarizona.png");
        $this->addReference('team8', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Chargers de Los Angeles");
        $team->setOddsteam("1.62");
        $team->setRegionOrigin("Los Angeles");
        $team->setLink("chargersdelosangeles.png");
        $this->addReference('team9', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Chiefs de Kansas City");
        $team->setOddsteam("1.27");
        $team->setRegionOrigin("Kansas City");
        $team->setLink("chiefsdekansascity.png");
        $this->addReference('team10', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Colts d'Indianapolis");
        $team->setOddsteam("2.25");
        $team->setRegionOrigin("Indiana");
        $team->setLink("coltsdindiannapolis.png");
        $this->addReference('team11', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Cow Boys de Dallas");
        $team->setOddsteam("1.54");
        $team->setRegionOrigin("Dallas");
        $team->setLink("cowboysdedallas.png");
        $this->addReference('team12', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Dolphins de Miami");
        $team->setOddsteam("3.10");
        $team->setRegionOrigin("Miami");
        $team->setLink("dolphinsdemiami.png");
        $this->addReference('team13', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Eagles de Philadelphie");
        $team->setOddsteam("1.40");
        $team->setRegionOrigin("Philadelphie");
        $team->setLink("eaglesdephiladelphie.png");
        $this->addReference('team14', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Falcons d'Atlanta");
        $team->setOddsteam("2.30");
        $team->setRegionOrigin("Atlanta");
        $team->setLink("falconsdatlanta.png");
        $this->addReference('team15', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Giants de New York");
        $team->setOddsteam("3.20");
        $team->setRegionOrigin("New York");
        $team->setLink("giantsdenewyork.png");
        $this->addReference('team16', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Jaguars de Jacksonville");
        $team->setOddsteam("2.20");
        $team->setRegionOrigin("Jacksonville");
        $team->setLink("jaguarsdejacksonville.png");
        $this->addReference('team17', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Jet de New York");
        $team->setOddsteam("1.86");
        $team->setRegionOrigin("New York");
        $team->setLink("jetsdenewyork.png");
        $this->addReference('team18', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Lions de Detroit");
        $team->setOddsteam("3.00");
        $team->setRegionOrigin("Detroit");
        $team->setLink("lionsdedetroit.png");
        $this->addReference('team19', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Panters de la Caroline");
        $team->setOddsteam("2.05");
        $team->setRegionOrigin("Caroline");
        $team->setLink("pantersdelacaroline.png");
        $this->addReference('team20', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Packers de Greenbay");
        $team->setOddsteam("2.00");
        $team->setRegionOrigin("Greenbay");
        $team->setLink("packersdegreenbay.png");
        $this->addReference('team21', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Patriots de la Nouvelle Angleterre");
        $team->setOddsteam("2.45");
        $team->setRegionOrigin("Boston");
        $team->setLink("patriotsdelanouvelleangleterre.png");
        $this->addReference('team22', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Raiders de Las Vegas");
        $team->setOddsteam("2.25");
        $team->setRegionOrigin("Las Vegas");
        $team->setLink("raidersdelasvegas.png");
        $this->addReference('team23', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Rams de Los Angeles");
        $team->setOddsteam("2.60");
        $team->setRegionOrigin("Los Angeles");
        $team->setLink("ramsdelosangeles.png");
        $this->addReference('team24', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Ravens de Baltimore");
        $team->setOddsteam("1.17");
        $team->setRegionOrigin("Baltimore");
        $team->setLink("ravensdebaltimore.png");
        $this->addReference('team25', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Saints de la Nouvelle Orléans");
        $team->setOddsteam("1.46");
        $team->setRegionOrigin("Nouvelle Orléans");
        $team->setLink("saintsdelanouvelleorleans.png");
        $this->addReference('team26', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Seahawks de Seattle");
        $team->setOddsteam("1.34");
        $team->setRegionOrigin("Seattle");
        $team->setLink("seahawksdeseattle.png");
        $this->addReference('team27', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Texans de Houston");
        $team->setOddsteam("3.70");
        $team->setRegionOrigin("Houston");
        $team->setLink("texansdehouston.png");
        $this->addReference('team28', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Titans du Tennesse");
        $team->setOddsteam("2.25");
        $team->setRegionOrigin("Tennesse");
        $team->setLink("titansdutennesse.png");
        $this->addReference('team29', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Vikings du Minnesota");
        $team->setOddsteam("1.29");
        $team->setRegionOrigin("Minnesota");
        $team->setLink("vikingsduminnesota.png");
        $this->addReference('team30', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Washington Commanders");
        $team->setOddsteam("1.31");
        $team->setRegionOrigin("Washington");
        $team->setLink("washingtoncommanders.png");
        $this->addReference('team31', $team);
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Steelers de Pittsburgh");
        $team->setOddsteam("2.05");
        $team->setRegionOrigin("Pittsburgh");
        $team->setLink("steelers.png");
        $this->addReference('team32', $team);
        $manager->persist($team);


        /* TEAM END */

        $manager->flush();
    }
}
