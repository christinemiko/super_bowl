<?php

namespace App\Controller\Api;
use App\Entity\FootballMatch;
use App\Entity\Sportbet;
use App\Entity\Team;
use App\Form\BetMatchFormType;
use App\Form\ApiFootballMatchFormType;
use App\Form\SportbetFormType;
use App\Repository\FootballMatchRepository;
use App\Repository\SportbetRepository;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiSportbetController extends AbstractController
{
    // Affiche tous les Paris sportifs//
    #[Route('/api/sportbets', name: 'get_apisportbets', methods: ['GET'])]
    public function getApisportbets(SportbetRepository $sportbetRepository, SerializerInterface $serializer): JsonResponse
    {
        $sportbets = $sportbetRepository->findAll();
        $json = $serializer->serialize($sportbets, 'json', ['groups' => 'sportbet']);
        return new JsonResponse($json, 200, ['Content-Type' => 'application/json'], true);
    }

    // Affiche tous les Paris sportifs d'un USER//
    #[Route('/api/usersportbets', name: 'get_apiusersportbets', methods: ['GET'])]
    public function getApiusersportbets(SportbetRepository $sportbetRepository, SerializerInterface $serializer): JsonResponse
    {
        $user = $this->getUser();
        $sportbets = $sportbetRepository->findBy(['user' => $user]);
        $json = $serializer->serialize($sportbets, 'json', ['groups' => 'sportbet']);
        return new JsonResponse($json, 200, ['Content-Type' => 'application/json'], true);
    }

    // Compte et affiche le nombre de User/footballMatch et le nbe User/team
    #[Route('/api/match/{footballMatch}/team/{team}/usersCount', name: 'get_user_counts', methods: ['GET'])]
    public function getUserCountsForMatch(SportbetRepository $sportbetRepository, SerializerInterface $serializer, Footballmatch $footballMatch, Team $team): JsonResponse
    {
        $userCountForMatch = $sportbetRepository->countUsersByMatch($footballMatch->getId());
        $userCountForTeamInMatch = $sportbetRepository->countUsersByTeamInMatch($footballMatch->getId(), $team->getId());

        $data = [
            'userCountForMatch' => $userCountForMatch,
            'userCountForTeamInMatch' => $userCountForTeamInMatch,
        ];

        $json = $serializer->serialize($data, 'json');
        return new JsonResponse($json, 200, ['Content-Type' => 'application/json'], true);
    }

    // Affiche tous les paris pour un footballmatch
    #[Route('/api/footballmatch/{footballMatch}/getsportbets', name: 'get_sportbets_for_match', methods: ['GET'])]
    public function getSportbetsForMatch(Footballmatch $footballMatch,SportbetRepository $sportbetRepository, SerializerInterface $serializer): JsonResponse
    {
        // Récupérer les paris pour le match
        $bets = $sportbetRepository->findBy(['footballMatch' => $footballMatch]);

        // Sérialiser les paris en JSON
        $json = $serializer->serialize($bets, 'json');

        return new JsonResponse($json, 200, ['Content-Type' => 'application/json'], true);
    }


    // Création dun nouveau sportbet
    #[Route('/api/newsportbet/{footballMatch}', name: 'create_newsportbet', methods: ['POST'])]
    public function createNewsportbet(
        Request $request,
        EntityManagerInterface $entityManager,
        FootballMatch $footballMatch,
        TeamRepository $teamRepository
        ): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true);

        $sportbet = new Sportbet();
        $sportbet->setUser($this->getUser());
        $sportbet->setTeam($teamRepository->find($parameters['team']));
        $sportbet->setFootballMatch($footballMatch);

        $team1 = $footballMatch->getTeam1();
        $team2 = $footballMatch->getTeam2();

        $form = $this->createForm(SportbetFormType::class, $sportbet, ['team1' => $team1, 'team2' => $team2]);
        $form->submit($parameters, false);
        // Passer false pour que les valeurs manquantes dans $parameters ne soient pas remplies par null

        if ($form->isValid()) {
            // Sauvegarde l'objet Sportbet dans la base de données
            $entityManager->persist($sportbet);
            $entityManager->flush();
            return new JsonResponse(['status' => 'Match created'], 201);
        } else {
            return new JsonResponse(['error' => (string) $form->getErrors(true)], 400);
        }
    }


    // Supprimer un sportbet
    #[Route('/api/sportbet/{id}', name: 'delete_apisportbet', methods: ['DELETE'])]
    public function deleteApiSportbet(int $id, EntityManagerInterface $entityManager, SportbetRepository $sportbetRepository): JsonResponse
    {
        $sportbet = $sportbetRepository->find($id);

        if (is_null($sportbet)) {
            throw $this->createNotFoundException('Pari-sportif non trouvé');
        }
        $sportbet->setDeleted(true);
        $entityManager->flush();

        return new JsonResponse('', 204, ['Content-Type' => 'application/json']);
    }

    // Modifier un sportbet totalement
    #[Route('/api/putsportbet/{id}', name: 'put_sportbet', methods: ['PUT'])]
    public function putSportbet(
        $id,
        Request $request,
        EntityManagerInterface $entityManager,
        SportbetRepository $sportbetRepository
    ): JsonResponse {
        $sportbet = $sportbetRepository->find($id);

        if (!$sportbet) {
            return new JsonResponse(['error' => 'Sportbet not found'], 404);
        }

        $team1 = $sportbet->getFootballMatch()->getTeam1();
        $team2 = $sportbet->getFootballMatch()->getTeam2();

        $form = $this->createForm(SportbetFormType::class, $sportbet, ['team1' => $team1, 'team2' => $team2]);
        $parameters = json_decode($request->getContent(), true);
        $form->submit($parameters);

        if ($form->isValid()) {
            $entityManager->persist($sportbet);
            $entityManager->flush();

            return new JsonResponse(['status' => 'Sportbet modified'], 200);
        } else {
            return new JsonResponse(['error' => (string) $form->getErrors(true)], 400);
        }
    }


    // Modifier un sportbet partiellement
    #[Route('/api/patchsportbet/{id}', name: 'patch_sportbet', methods: ['PATCH'])]
    public function patchSportbet(
        $id,
        Request $request,
        EntityManagerInterface $entityManager,
        SportbetRepository $sportbetRepository
    ): JsonResponse {
        $sportbet = $sportbetRepository->find($id);

        if (!$sportbet) {
            return new JsonResponse(['error' => 'Sportbet not found'], 404);
        }
        $team1 = $sportbet->getFootballMatch()->getTeam1();
        $team2 = $sportbet->getFootballMatch()->getTeam2();

        $form = $this->createForm(SportbetFormType::class, $sportbet, ['team1' => $team1, 'team2' => $team2]);
        $parameters = json_decode($request->getContent(), true);

        // Soumettre le formulaire avec le second paramètre à "PATCH", permet dafficher les datas existantes à modifier
        // sur statut et hourfinish de footballMatch
        $form->submit($parameters, false);

        if ($form->isValid()) {
            $entityManager->persist( $sportbet);
            $entityManager->flush();

            return new JsonResponse(['status' => 'Match modified'], 200);
        } else {
            return new JsonResponse(['error' => (string) $form->getErrors(true)], 400);
        }

    }

    // modifie la mise wager_made si team a gagné ou perdu
    #[Route('/api/footballmatch/{id}/patchsportbets', name: 'patch_sportbets_for_match', methods: ['PATCH'])]
    public function patchSportbetsForMatch(int $id, Request $request, EntityManagerInterface $entityManager, FootballmatchRepository $footballmatchRepository, SportbetRepository $sportbetRepository): JsonResponse
    {
        // Récupérer le match de football
        $footballmatch = $footballmatchRepository->find($id);

        // Vérifier si le match de football existe
        if (!$footballmatch) {
            return new JsonResponse(['error' => 'Match de football non trouvé'], 404);
        }

        // Récupérer tous les paris pour le match de football
        $sportbets = $sportbetRepository->findBy(['footballmatch' => $footballmatch]);

        // Vérifier si des paris ont été trouvés
        if (!$sportbets) {
            return new JsonResponse(['error' => 'Pas de paris trouvés pour ce match de football'], 404);
        }

        // Récupérer les données de la requête
        $data = json_decode($request->getContent(), true);

        // Mettre à jour chaque pari

        foreach ($sportbets as $sportbet) {
            if (isset($data['moneyGain'])) {
                $sportbet->setMoneyGain($data['moneyGain']);
            }
            if (isset($data['moneyLose'])) {
                $sportbet->setMoneyLose($data['moneyLose']);
            }
            $entityManager->persist($sportbet);
        }

        // Enregistrer les changements
        $entityManager->flush();

        return new JsonResponse(['success' => 'Paris mis à jour'], 200);
    }

}
