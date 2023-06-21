<?php

namespace App\Controller;

use App\Entity\FootballMatch;
use App\Entity\Sportbet;
use App\Form\BetMatchFormType;
use App\Repository\FootballMatchRepository;
use App\Repository\SportbetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class SportbetController extends AbstractController
{

    #[Route('betmatch/{footballMatch}', name: 'miser', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]

    public function newBetMatch(Request $request, EntityManagerInterface $entityManager, FootballMatch $footballMatch): Response
    {
        $user = $this->getUser();
        $team1 = $footballMatch->getTeam1();
        $team2 = $footballMatch->getTeam2();
        $existingSportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $user]);

        if (!$existingSportbet) {
            // Créer un nouveau pari
            $sportbet = new Sportbet();
            $sportbet->setUser($user);
            $sportbet->setFootballMatch($footballMatch);
            $currentDate = new \DateTime();
            $sportbet->setDatewagerMade($currentDate);
            $existingSportbet = false; // Passer existingSportbet à false car il n'existe pas
        } else {
            // Modifier un pari existant
            $sportbet = $existingSportbet;
            $existingSportbet = true; // Passer existingSportbet à true car il existe
        }

        //Integrer uniquement les deux équipes du Match dans le menu déroulant du Formulaire
        $form = $this->createForm(BetMatchFormType::class, $sportbet,[
            'team1' => $team1,
            'team2' => $team2,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sportbet = $form->getData();
            $entityManager->persist($sportbet);
            $entityManager->flush();
            return $this->redirectToRoute('parier');
        }

        if ($existingSportbet) {
            // Afficher le formulaire de modification d'un pari existant
            return $this->render('user/editbetmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => true,
            ]);
        } else {
            // Afficher le formulaire de création d'un nouveau pari
            return $this->render('betmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => false,
            ]);
        }
    }


    #[Route('editbetmatch/{footballMatch}', name: 'actualiser', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function editBetMatch( Request $request, EntityManagerInterface $entityManager, SportbetRepository $sportbetRepository, FootballMatch $footballMatch):Response
    {
        $user = $this->getUser();
        $sportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $user]);

        $form = $this->createForm(BetMatchFormType::class, $sportbet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sportbet);
            $entityManager->flush();
            return $this->redirectToRoute('parier');
        }

            return $this->render('user/editbetmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => true,
            ]);
    }

    #[Route('deletebetmatch/{footballMatch}', name: 'supprimer')]
    #[IsGranted('ROLE_USER')]
    public function DeleteBetMatch(Request $request, EntityManagerInterface $entityManager, SportbetRepository $sportbetRepository, FootballMatch $footballMatch): Response
    {
        $user = $this->getUser();
        $sportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $user]);
        $entityManager->remove($sportbet);
        $entityManager->flush();
        return $this->redirectToRoute("parier");
    }


    #[Route('betallmatches', name:'parier', methods: ['GET'])]
    public function BetAllMatches(FootballMatchRepository $footballMatchRepository,): Response
    {
        $footballMatch = $footballMatchRepository->findBy(['statut' => 'Prochainement']);

        return $this->render('betallmatches.html.twig', [

            'footballMatches' => $footballMatch,
        ]);

    }

    #[Route('/betselections', name: 'betselections', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function betSelections(Request $request, FootballMatchRepository $footballMatchRepository): Response
    {
        $selectedMatches = $request->request->all('selectedMatches', []);
        $selectedMatches = array_map('intval', $selectedMatches);

        // Enregistrez les identifiants des matchs sélectionnés dans la variable de session
        $session = $request->getSession();
        $session->set('selectedMatches', $selectedMatches);
         //var_dump($selectedMatches);

        // Récupérez les matchs sélectionnés à partir de la base de données en utilisant les identifiants
        $footballMatches = $footballMatchRepository->findBySelection($selectedMatches);
        var_dump($footballMatches);

        // Crée une instance du formulaire
        $form = $this->createForm(BetMatchFormType::class);

        // Passez le formulaire et les matchs sélectionnés au fichier Twig lors du rendu de la vue
        return $this->render('betselections.html.twig', [
            'footballMatches' => $footballMatches,
            'form' => $form->createView(),
        ]);
    }




}
