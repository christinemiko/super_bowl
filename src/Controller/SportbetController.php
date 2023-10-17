<?php

namespace App\Controller;

use App\Entity\FootballMatch;
use App\Entity\Sportbet;
use App\Form\BetMatchFormType;
use App\Repository\FootballMatchRepository;
use App\Repository\SportbetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Routing\RouterInterface;

class SportbetController extends AbstractController
{

    #[Route('betmatch/{footballMatch}', name: 'miser', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function newBetMatch(Request $request, EntityManagerInterface $entityManager, FootballMatch $footballMatch): Response
    {
        $user = $this->getUser();
        $team1 = $footballMatch->getTeam1();
        $team2 = $footballMatch->getTeam2();
        $existingSportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $user, 'deleted' => false]);

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
                'sportbet' => $sportbet,
            ]);
        } else {
            // Afficher le formulaire de création d'un nouveau pari
            return $this->render('betmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => false,
                'sportbet' => $sportbet,

            ]);
        }
    }

    #[Route('editbetmatch/{footballMatch}', name: 'actualiser', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function editBetMatch( Request $request, EntityManagerInterface $entityManager, SportbetRepository $sportbetRepository, FootballMatch $footballMatch):Response
    {
        $user = $this->getUser();
        $team1 = $footballMatch->getTeam1();
        $team2 = $footballMatch->getTeam2();
        $sportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $user, 'deleted' => false]);

        //Integrer uniquement les deux équipes du Match dans le menu déroulant du Formulaire
        $form = $this->createForm(BetMatchFormType::class, $sportbet,[
            'team1' => $team1,
            'team2' => $team2,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sportbet);
            $entityManager->flush();
            return $this->redirectToRoute('history');
        }

            return $this->render('user/editbetmatch.html.twig', [
                'form' => $form->createView(),
                'footballMatch' => $footballMatch,
                'existingSportbet' => true,
                'sportbet' => $sportbet,

            ]);
    }

    #[Route('deletebetmatch/{footballMatch}', name: 'supprimer')]
    #[IsGranted('ROLE_USER')]
    public function DeleteBetMatch(Request $request, EntityManagerInterface $entityManager, SportbetRepository $sportbetRepository, FootballMatch $footballMatch): Response
    {
        $user = $this->getUser();
        $sportbet = $entityManager->getRepository(Sportbet::class)->findOneBy(['footballMatch' => $footballMatch, 'user' => $user, 'deleted' => false]);
        $sportbet->setDeleted(true);
        $entityManager->persist($sportbet);
        $entityManager->flush();
        return $this->redirectToRoute("history");
    }


    #[Route('betallmatches', name:'parier')]
    public function BetAllMatches(FootballMatchRepository $footballMatchRepository,): Response
    {
        $footballMatch = $footballMatchRepository->findBy(['statut' => 'Prochainement', 'deleted' => false]);

        return $this->render('betallmatches.html.twig', [

            'footballMatches' => $footballMatch,
        ]);

    }

    #[Route('roadselections', name: 'roadselections')]
    public function RoadSelections(Request $request): Response
    {
        // recupère les selected Matches en POST parameters et envoie sur betselections
        $selectedMatches = $request->request->all('selectedMatches', []);
        return $this->redirectToRoute('betselections', ['selectedMatches' => $selectedMatches]);
    }


    #[Route('/betselections', name: 'betselections', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
     public function betSelections(Request $request, FootballMatchRepository $footballMatchRepository, EntityManagerInterface $entityManager, RouterInterface $router,SportbetRepository $sportbetRepository, LoggerInterface $logger): Response
    {

        $selectedMatches = $request->query->all()['selectedMatches'] ?? [];

        // Convertir les identifiants des matchs sélectionnés en entiers
        $selectedMatches = array_map('intval', $selectedMatches);

        // Récupérez les matchs sélectionnés à partir de la base de données en utilisant les identifiants
        $footballMatches = $footballMatchRepository->findBySelection($selectedMatches);

        // Récupérez l'utilisateur actuellement connecté (assumant que j'utilise un système d'authentification)
        $user = $this->getUser();
        $existingBets = $sportbetRepository->findExistingBets($user, $selectedMatches);

        $existingBetsAssoc = [];
        foreach ($existingBets as $bet) {
            $existingBetsAssoc[$bet->getFootballMatch()->getId()] = $bet;
        }
        // Créez un tableau pour stocker les formulaires
        $forms = [];
         //dump($footballMatches);
        $sportbet = null;

        foreach ($footballMatches as $footballMatch) {

            $existingSportbet =  $existingBetsAssoc[$footballMatch->getId()] ?? null;

            if ($existingSportbet) {
                $sportbet = $existingSportbet;
            } else {
                $sportbet = new Sportbet();
                $sportbet->setUser($user);
                $sportbet->setFootballMatch($footballMatch);

            }

            //Integrer uniquement les deux équipes du Match dans le menu déroulant du Formulaire
            $form = $this->createForm(BetMatchFormType::class, $sportbet,[
                'team1' => $footballMatch->getTeam1(),
                'team2' =>  $footballMatch->getTeam2(),
            ]);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $sportbet = $form->getData();
                $entityManager->persist($sportbet);
                $entityManager->flush();

                // Enlevez le match actuel des matchs sélectionnés
                $selectedMatches = array_diff($selectedMatches, [$footballMatch->getId()]);

                // Supposons que $totalMatches contienne le nombre total de matchs disponibles
                $totalMatches = count($selectedMatches);
                $logger->info('Redirection pour le match id: ' . $footballMatch->getId());

                if (count($selectedMatches) === 0) {
                    // Si tous les matchs ont été sélectionnés, redirigez vers la page 'parier'
                    return $this->redirectToRoute('parier');
                } else {
                    // Sinon, redirigez vers la même page avec les matchs restants
                    $redirectUrl = $router->generate('betselections', ['selectedMatches' => $selectedMatches]);
                    return $this->redirect($redirectUrl);
                }
            }

            // Ajoutez le formulaire au tableau des formulaires
            $forms[$footballMatch->getId()] = $form->createView();
        }

        // Passez le tableau des formulaires au fichier Twig lors du rendu de la vue
        return $this->render('betselections.html.twig', [
            'footballMatches' => $footballMatches,
            'forms' => $forms,
            'sportbet' => $sportbet,
        ]);
    }

}
