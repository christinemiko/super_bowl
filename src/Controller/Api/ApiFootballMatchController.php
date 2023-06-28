<?php

namespace App\Controller\Api;
use App\Entity\FootballMatch;
use App\Form\FootballMatchFormType;
use App\Repository\FootballMatchRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiFootballMatchController extends AbstractController
{
    // Affiche tous les footballMatchs statut == ACTUELLEMENT //

    #[Route('/api/footballmatches', name: 'get_apifootballmatches', methods: ['GET'])]
    public function getApifootballmatches(FootballMatchRepository $footballMatchRepository, SerializerInterface $serializer): JsonResponse
    {
        $footballMatches = $footballMatchRepository->findBy(['statut' => 'Actuellement']);
        $json = $serializer->serialize($footballMatches, 'json', ['groups' => 'footballmatch']);
        return new JsonResponse($json, 200, ['Content-Type' => 'application/json'], true);
    }

    // Affiche tous les footballMatchs statut == ACTUELLEMENT, PROCHAINEMENT, TERMINE//

    #[Route('/api/allfootballmatches', name: 'get_apiallfootballmatches', methods: ['GET'])]
    public function getApiallfootballmatches(FootballMatchRepository $footballMatchRepository, SerializerInterface $serializer): JsonResponse
    {
        $footballMatches = $footballMatchRepository->findAll();
        $json = $serializer->serialize( $footballMatches, 'json', ['groups' => 'footballmatch']);
        return new JsonResponse($json, 200, ['Content-Type' => 'application/json'], true);
    }

    // Affiche un seul footballMatch //

    #[Route('/api/footballmatch/{footballMatch}', name: 'get_apifootballmatch', methods: ['GET'])]
    public function getApiFootballMatch( SerializerInterface $serializer, Footballmatch $footballMatch): JsonResponse
    {
        //$footballMatch = $footballMatchRepository->find($footballMatch);
        //inutile car jai injecté le paramConverter (Footballmatch $footballMatch)

        $json = $serializer->serialize($footballMatch, 'json', ['groups' => 'footballmatch']);
        return new JsonResponse($json, 200, ['Content-Type' => 'application/json'], true);
    }

    // Création dun nouveau football Match

    #[Route('api/newfootballmatch', name: 'create_newfootballmatch', methods: ['POST'])]
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
    #[Route('/api/deletefootballmatch/{footballmatch}', name: 'delete_apifootballmatch', methods: ['DELETE'])]
    public function deleteApiFootballMatch(Footballmatch $footballMatch,EntityManagerInterface $entityManager): JsonResponse
    {
        $entityManager->remove($footballMatch);
        $entityManager->flush();


        return new JsonResponse(null, 204, ['Content-Type' => 'application/json'], true);
    }

    // Modifier un Football Match complètement

}
