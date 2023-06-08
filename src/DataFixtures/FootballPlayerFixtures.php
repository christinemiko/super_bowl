<?php

namespace App\DataFixtures;

use App\Entity\FootballPlayer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FootballPlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //$playersTeam1 = [
        //    ["WILKINSON", "Elijah", 65],
        //    ["FROHOLDT", "Hjalte", 72]
        //];

        //foreach ($playersTeam1 as $player) {
        //    $footballPlayer = new FootballPlayer();
        //    $footballPlayer->setLastName($player[0]);
        //    $footballPlayer->setFirstName($player[1]);
        //    $footballPlayer->setPlayerNumber($player[2]);
        //    $footballPlayer->setTeam($this->getReference("team1"));
        //}

        for ($i = 0; $i < 40; $i++) {
            $footballPlayer = new FootballPlayer();
            $footballPlayer->setLastName("fakerName");
            $footballPlayer->setFirstName("fakerLastName");
            $footballPlayer->setPlayerNumber($player[2]);
            $footballPlayer->setTeam($this->getReference("team1"));
        }

        /*Player TEAM CARDINAL DE LARIZONA START***********************************************************************/

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WILKINSON");
        $footballPlayer->setFirstName("Elijah");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FROHOLDT");
        $footballPlayer->setFirstName("Hjalte");
        $footballPlayer->setPlayerNumber(72);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DALEY");
        $footballPlayer->setFirstName("Dennis");
        $footballPlayer->setPlayerNumber(71);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BADARA");
        $footballPlayer->setFirstName("Traore");
        $footballPlayer->setPlayerNumber(70);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SEIKOVITS");
        $footballPlayer->setFirstName("Bernhard");
        $footballPlayer->setPlayerNumber(80);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("CONNER");
        $footballPlayer->setFirstName("James");
        $footballPlayer->setPlayerNumber(6);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("COLT");
        $footballPlayer->setFirstName("McCoy");
        $footballPlayer->setPlayerNumber(12);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HERNANDEZ");
        $footballPlayer->setFirstName("Will");
        $footballPlayer->setPlayerNumber(76);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DORTCH");
        $footballPlayer->setFirstName("Greg");
        $footballPlayer->setPlayerNumber(83);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JOSH");
        $footballPlayer->setFirstName("Jones");
        $footballPlayer->setPlayerNumber(79);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);


        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DRISKEL");
        $footballPlayer->setFirstName("Jeff");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("COOPER");
        $footballPlayer->setFirstName("Pharoh");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("ANDRE");
        $footballPlayer->setFirstName("Baccellia");
        $footballPlayer->setPlayerNumber(82);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HOPKINS");
        $footballPlayer->setFirstName("DeAndre");
        $footballPlayer->setPlayerNumber(10);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HAYDEN");
        $footballPlayer->setFirstName("Howerton");
        $footballPlayer->setPlayerNumber(75);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("CLEMENT");
        $footballPlayer->setFirstName("Corey");
        $footballPlayer->setPlayerNumber(23);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MCBRIDE");
        $footballPlayer->setFirstName("Trey");
        $footballPlayer->setPlayerNumber(85);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TATE");
        $footballPlayer->setFirstName("Auden");
        $footballPlayer->setPlayerNumber(89);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("ZACH");
        $footballPlayer->setFirstName("Pascal");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TOGIAI");
        $footballPlayer->setFirstName("Noah");
        $footballPlayer->setPlayerNumber(81);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WIMS");
        $footballPlayer->setFirstName("Javon");
        $footballPlayer->setPlayerNumber(84);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("D.J.");
        $footballPlayer->setFirstName("Humphries");
        $footballPlayer->setPlayerNumber(74);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("PIERCE");
        $footballPlayer->setFirstName("Chris");
        $footballPlayer->setPlayerNumber(49);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("RONDALE");
        $footballPlayer->setFirstName("Moore");
        $footballPlayer->setPlayerNumber(4);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("INGRAM");
        $footballPlayer->setFirstName("Keaontay");
        $footballPlayer->setPlayerNumber(30);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SMITH");
        $footballPlayer->setFirstName("Lecitus");
        $footballPlayer->setPlayerNumber(54);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WILLIAMS");
        $footballPlayer->setFirstName("TYSON");
        $footballPlayer->setPlayerNumber(22);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BLOUGH");
        $footballPlayer->setFirstName("David");
        $footballPlayer->setPlayerNumber(17);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("LACHAVIOUS");
        $footballPlayer->setFirstName("Simmons");
        $footballPlayer->setPlayerNumber(73);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BARTON");
        $footballPlayer->setFirstName("Jackson");
        $footballPlayer->setPlayerNumber(66);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BEACHUM");
        $footballPlayer->setFirstName("Kelvin");
        $footballPlayer->setPlayerNumber(68);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MURRAY");
        $footballPlayer->setFirstName("Kyler");
        $footballPlayer->setPlayerNumber(1);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);


        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("ERTZ");
        $footballPlayer->setFirstName("Zach");
        $footballPlayer->setPlayerNumber(86);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HAYES");
        $footballPlayer->setFirstName("Marquis");
        $footballPlayer->setPlayerNumber(78);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BROWN");
        $footballPlayer->setFirstName("Marquise");
        $footballPlayer->setPlayerNumber(2);
        $footballPlayer->setTeam(8);
        $manager->persist($footballPlayer);

        /*Player TEAM CARDINAL DE LARIZONA END ************************************************************************/

        /*Player TEAM 49ERS SAN FRANCISCO START ***********************************************************************/
        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WARD");
        $footballPlayer->setFirstName("Charvarius");
        $footballPlayer->setPlayerNumber(7);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TY");
        $footballPlayer->setFirstName("Mcgill");
        $footballPlayer->setPlayerNumber(96);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BARRETT");
        $footballPlayer->setFirstName("Alex");
        $footballPlayer->setPlayerNumber(58);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DARRYL");
        $footballPlayer->setFirstName("Johnson");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERRELL");
        $footballPlayer->setFirstName("Clelin");
        $footballPlayer->setPlayerNumber(94);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GIVENS");
        $footballPlayer->setFirstName("Kevin");
        $footballPlayer->setPlayerNumber(90);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JAVON");
        $footballPlayer->setFirstName("Hargrave");
        $footballPlayer->setPlayerNumber(98);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WARNER");
        $footballPlayer->setFirstName("Fred");
        $footballPlayer->setPlayerNumber(54);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("AMBRY");
        $footballPlayer->setFirstName("Thomas");
        $footballPlayer->setPlayerNumber(20);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("AJ");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(47);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BOSA");
        $footballPlayer->setFirstName("Nick");
        $footballPlayer->setPlayerNumber(97);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TALANOA");
        $footballPlayer->setFirstName("Hufanga");
        $footballPlayer->setPlayerNumber(29);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BURKS");
        $footballPlayer->setFirstName("Oren");
        $footballPlayer->setPlayerNumber(48);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("ARMSTEAD");
        $footballPlayer->setFirstName("Arik");
        $footballPlayer->setPlayerNumber(91);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SWILLING");
        $footballPlayer->setFirstName("Tre");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("ODUM");
        $footballPlayer->setFirstName("George");
        $footballPlayer->setPlayerNumber(30);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FLANNIGAN");
        $footballPlayer->setFirstName("Demetrius");
        $footballPlayer->setPlayerNumber(45);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HYDER");
        $footballPlayer->setFirstName("Kerry");
        $footballPlayer->setPlayerNumber(92);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GREENLAW");
        $footballPlayer->setFirstName("Dre");
        $footballPlayer->setPlayerNumber(57);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("QWUANTREZZ");
        $footballPlayer->setFirstName("Knight");
        $footballPlayer->setPlayerNumber(43);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DSHAWN");
        $footballPlayer->setFirstName("Jamison");
        $footballPlayer->setPlayerNumber(49);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("AVERY");
        $footballPlayer->setFirstName("Young");
        $footballPlayer->setPlayerNumber(36);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BEAL");
        $footballPlayer->setFirstName("Robert");
        $footballPlayer->setPlayerNumber(33);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JIAYIR");
        $footballPlayer->setFirstName("Brown");
        $footballPlayer->setPlayerNumber(27);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SORIMARIN");
        $footballPlayer->setFirstName("Mariano");
        $footballPlayer->setPlayerNumber(51);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GRAHAM");
        $footballPlayer->setFirstName("Jalen");
        $footballPlayer->setPlayerNumber(50);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DARRELL");
        $footballPlayer->setFirstName("Luter Jr");
        $footballPlayer->setPlayerNumber(28);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JACKSON");
        $footballPlayer->setFirstName("Drake");
        $footballPlayer->setPlayerNumber(95);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WINTERS");
        $footballPlayer->setFirstName("Dee");
        $footballPlayer->setPlayerNumber(53);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SPENCER");
        $footballPlayer->setFirstName("Waege");
        $footballPlayer->setPlayerNumber(69);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer->setLastName("HAWKINS");
        $footballPlayer->setFirstName("Tayler");
        $footballPlayer->setPlayerNumber(2);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DAVIS");
        $footballPlayer->setFirstName("Kalia");
        $footballPlayer->setPlayerNumber(93);
        $footballPlayer->setTeam(1);
        $manager->persist($footballPlayer);

        /*Player TEAM 49ERS SAN FRANCISCO END *************************************************************************/

        /*Player TEAM BEARS DE CHIGACO START *************************************************************************/
        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DONTA");
        $footballPlayer->setFirstName("Foreman");
        $footballPlayer->setPlayerNumber(21);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HERBERT");
        $footballPlayer->setFirstName("Khalil");
        $footballPlayer->setPlayerNumber(24);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("KMET");
        $footballPlayer->setFirstName("Cole");
        $footballPlayer->setPlayerNumber(85);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WALKER");
        $footballPlayer->setFirstName("Philip");
        $footballPlayer->setPlayerNumber(15);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("EQUIANIMEOUS");
        $footballPlayer->setFirstName("Brown");
        $footballPlayer->setPlayerNumber(19);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("EBNER");
        $footballPlayer->setFirstName("Trestan");
        $footballPlayer->setPlayerNumber(25);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JONES");
        $footballPlayer->setFirstName("Braxton");
        $footballPlayer->setPlayerNumber(70);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("EISELEN");
        $footballPlayer->setFirstName("Dieter");
        $footballPlayer->setPlayerNumber(60);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DIESCH");
        $footballPlayer->setFirstName("Kellen");
        $footballPlayer->setPlayerNumber(78);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("PETTIS");
        $footballPlayer->setFirstName("Dante");
        $footballPlayer->setPlayerNumber(86);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("ALLEN");
        $footballPlayer->setFirstName("Chase");
        $footballPlayer->setPlayerNumber(87);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JENKINS");
        $footballPlayer->setFirstName("Teven");
        $footballPlayer->setPlayerNumber(76);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JONES");
        $footballPlayer->setFirstName("Velus");
        $footballPlayer->setPlayerNumber(12);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DAVIS");
        $footballPlayer->setFirstName("Nate");
        $footballPlayer->setPlayerNumber(64);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HOMER");
        $footballPlayer->setFirstName("Travis");
        $footballPlayer->setPlayerNumber(20);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("REED");
        $footballPlayer->setFirstName("Joe");
        $footballPlayer->setPlayerNumber(80);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("PETERMAN");
        $footballPlayer->setFirstName("Nathan");
        $footballPlayer->setPlayerNumber(14);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FOUNTAIN");
        $footballPlayer->setFirstName("Daurice");
        $footballPlayer->setPlayerNumber(82);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("CLAYPOOL");
        $footballPlayer->setFirstName("Chase");
        $footballPlayer->setPlayerNumber(10);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JATYRE");
        $footballPlayer->setFirstName("Carter");
        $footballPlayer->setPlayerNumber(69);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TONYAN");
        $footballPlayer->setFirstName("Robert");
        $footballPlayer->setPlayerNumber(18);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TONGES");
        $footballPlayer->setFirstName("Jake");
        $footballPlayer->setPlayerNumber(81);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WHITEHAIR");
        $footballPlayer->setFirstName("Cody");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("KRAMER");
        $footballPlayer->setFirstName("Doug");
        $footballPlayer->setPlayerNumber(68);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("LEATHERWOOD");
        $footballPlayer->setFirstName("Alex");
        $footballPlayer->setPlayerNumber(72);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BOROM");
        $footballPlayer->setFirstName("Larry");
        $footballPlayer->setPlayerNumber(75);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MOONEY");
        $footballPlayer->setFirstName("Darnell");
        $footballPlayer->setPlayerNumber(11);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WEBSTER");
        $footballPlayer->setFirstName("Nsimba");
        $footballPlayer->setPlayerNumber(83);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BLASINGAME");
        $footballPlayer->setFirstName("Khari");
        $footballPlayer->setPlayerNumber(35);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FIELDS");
        $footballPlayer->setFirstName("Justin");
        $footballPlayer->setPlayerNumber(1);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MOORE");
        $footballPlayer->setFirstName("DJ");
        $footballPlayer->setPlayerNumber(2);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("LUCAS");
        $footballPlayer->setFirstName("Patrick");
        $footballPlayer->setPlayerNumber(62);
        $footballPlayer->setTeam(2);
        $manager->persist($footballPlayer);

        /*Player TEAM BEARS DE CHIGACO END *************************************************************************/

        /*Player TEAM BENGALS DE CINCINNATI START *************************************************************************/
        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DEVIN");
        $footballPlayer->setFirstName("Asiasi");
        $footballPlayer->setPlayerNumber(86);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SAMPLE");
        $footballPlayer->setFirstName("Drew");
        $footballPlayer->setPlayerNumber(89);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WILLIAMS");
        $footballPlayer->setFirstName("Jonah");
        $footballPlayer->setPlayerNumber(73);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GILIAM");
        $footballPlayer->setFirstName("Nathan");
        $footballPlayer->setPlayerNumber(66);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TANNER");
        $footballPlayer->setFirstName("Hudson");
        $footballPlayer->setPlayerNumber(87);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("LAEL");
        $footballPlayer->setFirstName("Collins");
        $footballPlayer->setPlayerNumber(71);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BURROW");
        $footballPlayer->setFirstName("Joe");
        $footballPlayer->setPlayerNumber(9);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("LASSITER");
        $footballPlayer->setFirstName("Kwamie");
        $footballPlayer->setPlayerNumber(18);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TRENT");
        $footballPlayer->setFirstName("Taylor");
        $footballPlayer->setPlayerNumber(11);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SMITH");
        $footballPlayer->setFirstName("Dante");
        $footballPlayer->setPlayerNumber(70);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TRAYVEON");
        $footballPlayer->setFirstName("Williams");
        $footballPlayer->setPlayerNumber(32);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HAKEEM");
        $footballPlayer->setFirstName("Adeniji");
        $footballPlayer->setPlayerNumber(77);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("CARMAN");
        $footballPlayer->setFirstName("Jackson");
        $footballPlayer->setPlayerNumber(79);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FORD");
        $footballPlayer->setFirstName("Cody");
        $footballPlayer->setPlayerNumber(61);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BOYD");
        $footballPlayer->setFirstName("Tyler");
        $footballPlayer->setPlayerNumber(83);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MIXON");
        $footballPlayer->setFirstName("Joe");
        $footballPlayer->setPlayerNumber(28);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("KARRAS");
        $footballPlayer->setFirstName("Ted");
        $footballPlayer->setPlayerNumber(64);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HIGGINS");
        $footballPlayer->setFirstName("Tee");
        $footballPlayer->setPlayerNumber(5);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("COCHRAN");
        $footballPlayer->setFirstName("Devin");
        $footballPlayer->setPlayerNumber(76);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MORGAN");
        $footballPlayer->setFirstName("Stanley");
        $footballPlayer->setPlayerNumber(17);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HILL");
        $footballPlayer->setFirstName("Trey");
        $footballPlayer->setPlayerNumber(63);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BROWN");
        $footballPlayer->setFirstName("Orlando");
        $footballPlayer->setPlayerNumber(75);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);


        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("VOLSON");
        $footballPlayer->setFirstName("Cordell");
        $footballPlayer->setPlayerNumber(67);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SHARPING");
        $footballPlayer->setFirstName("Max");
        $footballPlayer->setPlayerNumber(74);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BOWERS");
        $footballPlayer->setFirstName("Nick");
        $footballPlayer->setPlayerNumber(82);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BROWN");
        $footballPlayer->setFirstName("Ben");
        $footballPlayer->setPlayerNumber(62);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("CAPPA");
        $footballPlayer->setFirstName("Alex");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HOLYFIELD");
        $footballPlayer->setFirstName("Elijah");
        $footballPlayer->setPlayerNumber(36);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SMITH");
        $footballPlayer->setFirstName("Irv");
        $footballPlayer->setPlayerNumber(81);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TRENTON");
        $footballPlayer->setFirstName("Irwin");
        $footballPlayer->setPlayerNumber(16);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BROWNING");
        $footballPlayer->setFirstName("Jake");
        $footballPlayer->setPlayerNumber(6);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("EVANS");
        $footballPlayer->setFirstName("Chris");
        $footballPlayer->setPlayerNumber(25);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("CHASE");
        $footballPlayer->setFirstName("Jamarr");
        $footballPlayer->setPlayerNumber(1);
        $footballPlayer->setTeam(3);
        $manager->persist($footballPlayer);

        /*Player TEAM BENGALS DE CINCINNATI END *************************************************************************/

        /*Player TEAM BILLS DE BUFFALO START ****************************************************************************/

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BATES");
        $footballPlayer->setFirstName("Ryan");
        $footballPlayer->setPlayerNumber(71);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MCGOVERN");
        $footballPlayer->setFirstName("Connor");
        $footballPlayer->setPlayerNumber(66);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);


        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SHAKIR");
        $footballPlayer->setFirstName("Khalil");
        $footballPlayer->setPlayerNumber(10);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SHERFIELD");
        $footballPlayer->setFirstName("Trent");
        $footballPlayer->setPlayerNumber(16);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("ALLEN");
        $footballPlayer->setFirstName("Josh");
        $footballPlayer->setPlayerNumber(17);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GILLIAM");
        $footballPlayer->setFirstName("Reggie");
        $footballPlayer->setPlayerNumber(41);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("QUESSENBERRY");
        $footballPlayer->setFirstName("David");
        $footballPlayer->setPlayerNumber(77);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MITCH");
        $footballPlayer->setFirstName("Morse");
        $footballPlayer->setPlayerNumber(60);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DAWKINS");
        $footballPlayer->setFirstName("Dion");
        $footballPlayer->setPlayerNumber(73);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HARRIS");
        $footballPlayer->setFirstName("Damien");
        $footballPlayer->setPlayerNumber(22);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("KNOX");
        $footballPlayer->setFirstName("Dawson");
        $footballPlayer->setPlayerNumber(88);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BEASLEY");
        $footballPlayer->setFirstName("Cole");
        $footballPlayer->setPlayerNumber(11);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);


        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MANCZ");
        $footballPlayer->setFirstName("Greg");
        $footballPlayer->setPlayerNumber(62);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("KEESEAN");
        $footballPlayer->setFirstName("Johnson");
        $footballPlayer->setPlayerNumber(19);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DEONTE");
        $footballPlayer->setFirstName("Harty");
        $footballPlayer->setPlayerNumber(11);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DIGGS");
        $footballPlayer->setFirstName("Stefon");
        $footballPlayer->setPlayerNumber(14);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BOETTGER");
        $footballPlayer->setFirstName("Ike");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("EDWARDS");
        $footballPlayer->setFirstName("David");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("PATMON");
        $footballPlayer->setFirstName("Dezmon");
        $footballPlayer->setPlayerNumber(19);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DAVIDSON");
        $footballPlayer->setFirstName("Zach");
        $footballPlayer->setPlayerNumber(84);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("COOK");
        $footballPlayer->setFirstName("James");
        $footballPlayer->setPlayerNumber(4);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("ALLEN");
        $footballPlayer->setFirstName("Kyle");
        $footballPlayer->setPlayerNumber(9);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);


        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BARKLEY");
        $footballPlayer->setFirstName("Matt");
        $footballPlayer->setPlayerNumber(5);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GABRIEL");
        $footballPlayer->setFirstName("Davis");
        $footballPlayer->setPlayerNumber(13);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("ANDERSON");
        $footballPlayer->setFirstName("Alec");
        $footballPlayer->setPlayerNumber(70);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JARVIS");
        $footballPlayer->setFirstName("Kevin");
        $footballPlayer->setPlayerNumber(63);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MORRIS");
        $footballPlayer->setFirstName("Quintin");
        $footballPlayer->setPlayerNumber(85);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HINES");
        $footballPlayer->setFirstName("Nyheim");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BROWN");
        $footballPlayer->setFirstName("Spencer");
        $footballPlayer->setPlayerNumber(79);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DOYLE");
        $footballPlayer->setFirstName("Tommy");
        $footballPlayer->setPlayerNumber(72);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("VAN DEMARK");
        $footballPlayer->setFirstName("Ryan");
        $footballPlayer->setPlayerNumber(74);
        $footballPlayer->setTeam(4);
        $manager->persist($footballPlayer);

        /*Player TEAM BILLS DE BUFFALO END ****************************************************************************/

        /*Player TEAM BRONCOS DE DENVER START ****************************************************************************/
        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HINTON");
        $footballPlayer->setFirstName("Kendall");
        $footballPlayer->setPlayerNumber(9);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BOLLES");
        $footballPlayer->setFirstName("Garrett");
        $footballPlayer->setPlayerNumber(72);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("CALLAWAY");
        $footballPlayer->setFirstName("Marquez");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BAILEY");
        $footballPlayer->setFirstName("Quinn");
        $footballPlayer->setPlayerNumber(75);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TIM");
        $footballPlayer->setFirstName("Patrick");
        $footballPlayer->setPlayerNumber(81);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("RUSSEL");
        $footballPlayer->setFirstName("Wilson");
        $footballPlayer->setPlayerNumber(3);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WATTENBERG");
        $footballPlayer->setFirstName("Luke");
        $footballPlayer->setPlayerNumber(60);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("STIDHAM");
        $footballPlayer->setFirstName("Jarrett");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("OKWUEGBUNAM");
        $footballPlayer->setFirstName("Albert");
        $footballPlayer->setPlayerNumber(85);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GUARANTANO ");
        $footballPlayer->setFirstName("Jarrett");
        $footballPlayer->setPlayerNumber(11);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MANHERTZ");
        $footballPlayer->setFirstName("Chris");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BURTON");
        $footballPlayer->setFirstName("Michael");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JONES");
        $footballPlayer->setFirstName("Tony");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FULLER");
        $footballPlayer->setFirstName("Kyle");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("CUSHENBERRY");
        $footballPlayer->setFirstName("Lloyd");
        $footballPlayer->setPlayerNumber(79);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JAVONTE");
        $footballPlayer->setFirstName("Williams");
        $footballPlayer->setPlayerNumber(33);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("KJ");
        $footballPlayer->setFirstName("Hamler");
        $footballPlayer->setPlayerNumber(1);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("PRINCE");
        $footballPlayer->setFirstName("Isaiah");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MEINERZ");
        $footballPlayer->setFirstName("Quinn");
        $footballPlayer->setPlayerNumber(77);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WASHINGTON");
        $footballPlayer->setFirstName("Montrell");
        $footballPlayer->setPlayerNumber(12);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DILAURO");
        $footballPlayer->setFirstName("Christian");
        $footballPlayer->setPlayerNumber(67);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HUNTER");
        $footballPlayer->setFirstName("Thedford");
        $footballPlayer->setPlayerNumber(68);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("VIRGIL");
        $footballPlayer->setFirstName("Jalen");
        $footballPlayer->setPlayerNumber(15);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SUTTON");
        $footballPlayer->setFirstName("Courtland");
        $footballPlayer->setPlayerNumber(14);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("LILJORDAN");
        $footballPlayer->setFirstName("Humphrey");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DULCICH");
        $footballPlayer->setFirstName("Greg");
        $footballPlayer->setPlayerNumber(80);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MCGLINCHEY");
        $footballPlayer->setFirstName("Mike");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("POWERS");
        $footballPlayer->setFirstName("Ben");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("CROCKETT");
        $footballPlayer->setFirstName("Damarea");
        $footballPlayer->setPlayerNumber(28);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JOHNSON");
        $footballPlayer->setFirstName("Brandon");
        $footballPlayer->setPlayerNumber(89);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SAMAJE");
        $footballPlayer->setFirstName("Perine");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("BADDIE");
        $footballPlayer->setFirstName("Tyler");
        $footballPlayer->setPlayerNumber(36);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SHERMANN");
        $footballPlayer->setFirstName("William");
        $footballPlayer->setPlayerNumber(78);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JEUDDY");
        $footballPlayer->setFirstName("Jerry");
        $footballPlayer->setPlayerNumber(10);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MCALLISTER");
        $footballPlayer->setFirstName("Tyreik");
        $footballPlayer->setPlayerNumber(39);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(5);
        $manager->persist($footballPlayer);
        /*Player TEAM BRONCOS DE DENVER END ****************************************************************************/

        /*Player TEAM BROWN DE CLEVELAND START ****************************************************************************/
        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FERGUSON");
        $footballPlayer->setFirstName("Parker");
        $footballPlayer->setPlayerNumber(65);
        $footballPlayer->setTeam(6);
        $manager->persist($footballPlayer);

        /*Player TEAM BROWN DE CLEVELAND END ****************************************************************************/

        /*Player TEAM BUCCANEERS DE TAMPABAY START****************************************************************************/
        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("TRASH");
        $footballPlayer->setFirstName("Kyle");
        $footballPlayer->setPlayerNumber(2);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WELLS");
        $footballPlayer->setFirstName("David");
        $footballPlayer->setPlayerNumber(89);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("NIESE");
        $footballPlayer->setFirstName("Michael");
        $footballPlayer->setPlayerNumber(63);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MAYFIELD");
        $footballPlayer->setFirstName("Baker");
        $footballPlayer->setPlayerNumber(6);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GAGE");
        $footballPlayer->setFirstName("Russell");
        $footballPlayer->setPlayerNumber(17);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("KESHAWN");
        $footballPlayer->setFirstName("Vaughn");
        $footballPlayer->setPlayerNumber(21);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("THOMPKINS");
        $footballPlayer->setFirstName("Deven");
        $footballPlayer->setPlayerNumber(83);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("FEILER");
        $footballPlayer->setFirstName("Matt");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WHITE");
        $footballPlayer->setFirstName("Rachaad");
        $footballPlayer->setPlayerNumber(1);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("JENSEN");
        $footballPlayer->setFirstName("Ryan");
        $footballPlayer->setPlayerNumber(66);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GEIGER");
        $footballPlayer->setFirstName("Kaylon");
        $footballPlayer->setPlayerNumber(80);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("COOK");
        $footballPlayer->setFirstName("Dylan");
        $footballPlayer->setPlayerNumber(80);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("LAIRD");
        $footballPlayer->setFirstName("Patrick");
        $footballPlayer->setPlayerNumber(43);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HAINSEY");
        $footballPlayer->setFirstName("Robert");
        $footballPlayer->setPlayerNumber(70);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("STINNIE");
        $footballPlayer->setFirstName("Aaron");
        $footballPlayer->setPlayerNumber(64);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("DAFNEY");
        $footballPlayer->setFirstName("Dominique");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("HERMANNS");
        $footballPlayer->setFirstName("Grant");
        $footballPlayer->setPlayerNumber(74);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GODWIN");
        $footballPlayer->setFirstName("Chris");
        $footballPlayer->setPlayerNumber(14);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("EVANS");
        $footballPlayer->setFirstName("Mike");
        $footballPlayer->setPlayerNumber(13);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("LEVERETT");
        $footballPlayer->setFirstName("Nick");
        $footballPlayer->setPlayerNumber(60);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("EDMON");
        $footballPlayer->setFirstName("Chase");
        $footballPlayer->setPlayerNumber(0);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WIRFS");
        $footballPlayer->setFirstName("Tristan");
        $footballPlayer->setPlayerNumber(78);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("SKULE");
        $footballPlayer->setFirstName("Justin");
        $footballPlayer->setPlayerNumber(77);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("WALTON");
        $footballPlayer->setFirstName("Brandon");
        $footballPlayer->setPlayerNumber(73);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("GOEDEKE");
        $footballPlayer->setFirstName("Luke");
        $footballPlayer->setPlayerNumber(67);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("OTTON");
        $footballPlayer->setFirstName("Cade");
        $footballPlayer->setPlayerNumber(88);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("MOLCHON");
        $footballPlayer->setFirstName("John");
        $footballPlayer->setPlayerNumber(75);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);

        $footballPlayer = new FootballPlayer();
        $footballPlayer->setLastName("KIEFT");
        $footballPlayer->setFirstName("Ko");
        $footballPlayer->setPlayerNumber(41);
        $footballPlayer->setTeam(7);
        $manager->persist($footballPlayer);



        /*Player TEAM BUCCANEERS DE TAMPABAY END****************************************************************************/
        $manager->flush();
    }
}
