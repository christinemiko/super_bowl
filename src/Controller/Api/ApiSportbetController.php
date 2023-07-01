<?php

namespace App\Controller\Api;
use App\Entity\FootballMatch;
use App\Entity\Sportbet;
use App\Entity\Team;
use App\Form\FootballMatchFormType;
use App\Repository\FootballMatchRepository;
use App\Repository\SportbetRepository;
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


    // Création dun nouveau football Match
    #[Route('/api/newfootballmatch', name: 'create_newfootballmatch', methods: ['POST'])]
    public function createNewfootballmatch(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $footballMatch = new FootballMatch();
        $form = $this->createForm(FootballMatchFormType::class, $footballMatch);
        $parameters = json_decode($request->getContent(), true);
        $form->submit($parameters);

        if ($form->isValid()) {
            // Sauvegarde l'objet FootballMatch dans la base de données
            $entityManager->persist($footballMatch);
            $entityManager->flush();
            return new JsonResponse(['status' => 'Match created'], 201);
        } else {
            return new JsonResponse(['error' => (string) $form->getErrors(true)], 400);
        }
    }

    // Supprimer un Football Match
    #[Route('/api/deletefootballmatch/{id}', name: 'delete_apifootballmatch', methods: ['DELETE'])]
    public function deleteApiFootballMatch(int $id, EntityManagerInterface $entityManager, FootballMatchRepository $footballMatchRepository): JsonResponse
    {
        $footballMatch = $footballMatchRepository->find($id);

        if (is_null($footballMatch)) {
            throw $this->createNotFoundException('Match non trouvé');
        }
        $footballMatch->setDeleted(true);
        $entityManager->flush();

        return new JsonResponse('', 204, ['Content-Type' => 'application/json']);
    }

    // Modifier un Football Match complètement
    #[Route('/api/putfootballmatch/{footballMatch}', name: 'put_footballMatch', methods: ['PUT'])]
    public function putFootballMatch(Request $request, EntityManagerInterface $entityManager,Footballmatch $footballMatch ): JsonResponse
    {
        $form = $this->createForm(FootballMatchFormType::class,$footballMatch);
        $parameters = json_decode($request->getContent(), true);
        $form->submit($parameters);

        if ($form->isValid()) {
            $entityManager->persist($footballMatch);
            $entityManager->flush();

            return new JsonResponse(['status' => 'Match modified'], 200);
        } else {
            return new JsonResponse(['error' => (string) $form->getErrors(true)], 400);
        }

      }
    // Modifier un Football Match partiellement sur Statut et finished_hour
    #[Route('/api/patchfootballmatch/{footballMatch}', name: 'patch_footballMatch', methods: ['PATCH'])]
    public function patchFootballMatch(Request $request, EntityManagerInterface $entityManager,Footballmatch $footballMatch): JsonResponse
    {
        $form = $this->createForm(FootballMatchFormType::class,$footballMatch);
        $parameters = json_decode($request->getContent(), true);

        // Soumettre le formulaire avec le second paramètre à "PATCH", permet dafficher les datas existantes à modifier
        // sur statut et hourfinish de footballMatch
        $form->submit($parameters, false);

        if ($form->isValid()) {
            $entityManager->persist($footballMatch);
            $entityManager->flush();

            return new JsonResponse(['status' => 'Match modified'], 200);
        } else {
            return new JsonResponse(['error' => (string) $form->getErrors(true)], 400);
        }

    }
}
