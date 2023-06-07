<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /* TEAM START */

        $team = new Team();
        $team->setTeamName("49ers de San Francisco");
        $team->setNumberPlayer("33");
        $team->setOddsteam("1.56");
        $team->setRegionOrigin("San Francisco");
        $team->setLink("49ersdesanfrancisco.png");
        $manager->persist($team);


        $team = new Team();
        $team->setTeamName("Bears de Chigaco");
        $team->setNumberPlayer("32");
        $team->setOddsteam("1.60");
        $team->setRegionOrigin("Chigaco");
        $team->setLink("bearsdechigaco.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Bengals de Cincinnati");
        $team->setNumberPlayer("40");
        $team->setOddsteam("2.15");
        $team->setRegionOrigin("Cincinnati");
        $team->setLink("bengalsdecincinnati.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Bills de Buffalo");
        $team->setNumberPlayer("31");
        $team->setOddsteam("1.49");
        $team->setRegionOrigin("New York");
        $team->setLink("billsdebuffalo.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Broncos de Denver");
        $team->setNumberPlayer("31");
        $team->setOddsteam("1.46");
        $team->setRegionOrigin("Denver");
        $team->setLink("broncosdedenver.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Browns de Cleveland");
        $team->setNumberPlayer("40");
        $team->setOddsteam("1.94");
        $team->setRegionOrigin("Cleveland");
        $team->setLink("brownsdecleveland.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Buccaneers de Tampabay");
        $team->setNumberPlayer("37");
        $team->setOddsteam("2.85");
        $team->setRegionOrigin("Floride");
        $team->setLink("buccanneersdetampabay.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Cardinals de l'Arizona");
        $team->setNumberPlayer("44");
        $team->setOddsteam("2.75");
        $team->setRegionOrigin("Arizona");
        $team->setLink("cardinalsdelarizona.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Chargers de Los Angeles");
        $team->setNumberPlayer("42");
        $team->setOddsteam("1.62");
        $team->setRegionOrigin("Los Angeles");
        $team->setLink("chargersdelosangeles.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Chiefs de Kansas City");
        $team->setNumberPlayer("40");
        $team->setOddsteam("1.27");
        $team->setRegionOrigin("Kansas City");
        $team->setLink("chiefsdekansascity.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Colts d'Indianapolis");
        $team->setNumberPlayer("37");
        $team->setOddsteam("2.25");
        $team->setRegionOrigin("Indiana");
        $team->setLink("coltsdindiannapolis.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Cow Boys de Dallas");
        $team->setNumberPlayer("37");
        $team->setOddsteam("1.54");
        $team->setRegionOrigin("Dallas");
        $team->setLink("cowboysdedallas.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Dolphins de Miami");
        $team->setNumberPlayer("40");
        $team->setOddsteam("3.10");
        $team->setRegionOrigin("Miami");
        $team->setLink("dolphinsdemiami.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Eagles de Philadelphie");
        $team->setNumberPlayer("40");
        $team->setOddsteam("1.40");
        $team->setRegionOrigin("Philadelphie");
        $team->setLink("eaglesdephiladelphie.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Falcons d'Atlanta");
        $team->setNumberPlayer("40");
        $team->setOddsteam("2.30");
        $team->setRegionOrigin("Atlanta");
        $team->setLink("falconsdatlanta.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Giants de New York");
        $team->setNumberPlayer("40");
        $team->setOddsteam("3.20");
        $team->setRegionOrigin("New York");
        $team->setLink("giantsdenewyork.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Jaguars de Jacksonville");
        $team->setNumberPlayer("40");
        $team->setOddsteam("2.20");
        $team->setRegionOrigin("Jacksonville");
        $team->setLink("jaguarsdejacksonville.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Jet de New York");
        $team->setNumberPlayer("41");
        $team->setOddsteam("1.86");
        $team->setRegionOrigin("New York");
        $team->setLink("jetsdenewyork.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Lions de Detroit");
        $team->setNumberPlayer("41");
        $team->setOddsteam("3.00");
        $team->setRegionOrigin("Detroit");
        $team->setLink("lionsdedetroit.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Panters de la Caroline");
        $team->setNumberPlayer("39");
        $team->setOddsteam("2.05");
        $team->setRegionOrigin("Caroline");
        $team->setLink("pantersdelacaroline.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Packers de Greenbay");
        $team->setNumberPlayer("40");
        $team->setOddsteam("2.00");
        $team->setRegionOrigin("Greenbay");
        $team->setLink("packersdegreenbay.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Patriots de la Nouvelle Angleterre");
        $team->setNumberPlayer("40");
        $team->setOddsteam("2.45");
        $team->setRegionOrigin("Boston");
        $team->setLink("patriotsdelanouvelleangleterre.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Raiders de Las Vegas");
        $team->setNumberPlayer("40");
        $team->setOddsteam("2.25");
        $team->setRegionOrigin("Las Vegas");
        $team->setLink("raidersdelasvegas.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Rams de Los Angeles");
        $team->setNumberPlayer("40");
        $team->setOddsteam("2.60");
        $team->setRegionOrigin("Los Angeles");
        $team->setLink("ramsdelosangeles.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Ravens de Baltimore");
        $team->setNumberPlayer("40");
        $team->setOddsteam("1.17");
        $team->setRegionOrigin("Baltimore");
        $team->setLink("ravensdebaltimore.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Saints de la Nouvelle Orléans");
        $team->setNumberPlayer("40");
        $team->setOddsteam("1.46");
        $team->setRegionOrigin("Nouvelle Orléans");
        $team->setLink("saintsdelanouvelleorleans.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Seahawks de Seattle");
        $team->setNumberPlayer("40");
        $team->setOddsteam("1.34");
        $team->setRegionOrigin("Seattle");
        $team->setLink("seahawksdeseattle.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Texans de Houston");
        $team->setNumberPlayer("40");
        $team->setOddsteam("3.70");
        $team->setRegionOrigin("Houston");
        $team->setLink("texansdehouston.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Titans du Tennesse");
        $team->setNumberPlayer("40");
        $team->setOddsteam("2.25");
        $team->setRegionOrigin("Tennesse");
        $team->setLink("titansdutennesse.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Vikings du Minnesota");
        $team->setNumberPlayer("40");
        $team->setOddsteam("1.29");
        $team->setRegionOrigin("Minnesota");
        $team->setLink("vikingsduminnesota.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Washington Commanders");
        $team->setNumberPlayer("40");
        $team->setOddsteam("1.31");
        $team->setRegionOrigin("Washington");
        $team->setLink("washingtoncommanders.png");
        $manager->persist($team);

        $team = new Team();
        $team->setTeamName("Steelers de Pittsburgh");
        $team->setNumberPlayer("40");
        $team->setOddsteam("2.05");
        $team->setRegionOrigin("Pittsburgh");
        $team->setLink("steelers.png");
        $manager->persist($team);


        /* TEAM END */

        $manager->flush();
    }
}
