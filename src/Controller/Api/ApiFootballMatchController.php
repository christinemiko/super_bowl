<?php

namespace App\Controller\Api;
use App\Entity\FootballMatch;
use App\Entity\Sportbet;
use App\Form\ApiFootballMatchFormType;
use App\Repository\FootballMatchRepository;
use App\Repository\SportbetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiFootballMatchController extends AbstractController
{
    // Affiche tous les footballMatchs statut == ACTUELLEMENT //

    #[Route('/api/footballmatches', name: 'get_apifootballmatches', methods: ['GET'])]
    public function getApifootballmatches(FootballMatchRepository $footballMatchRepository, SerializerInterface $serializer): JsonResponse
    {
        $footballMatches = $footballMatchRepository->findBy(['statut' => 'Actuellement', 'deleted' => false]);
        $json = $serializer->serialize($footballMatches, 'json', ['groups' => 'footballmatch']);
        return new JsonResponse($json, 200, ['Content-Type' => 'application/json'], true);
    }

    // Affiche tous les footballMatchs statut == ACTUELLEMENT où le USER a parié //

    #[Route('/api/getfootballmatchesuser', name: 'get_apigetfootballmatchesuser', methods: ['GET'])]
    public function getApiGetfootballmatchesUser(SportbetRepository $sportbetRepository, SerializerInterface $serializer): JsonResponse
    {
        $user = $this->getUser();

        // Trouver tous les paris sportifs de l'utilisateur actuel
        $userSportbets = $sportbetRepository->findBy(['user' => $user]);

        // Initialiser un tableau pour stocker les matchs de football
        $footballMatches = [];

        // Parcourir les paris sportifs pour obtenir les matchs de football
        foreach ($userSportbets as $sportbet) {
            $footballMatch = $sportbet->getFootballMatch();

            // Vérifier que le match est actuellement en cours et non supprimé
            if ($footballMatch->getStatut() === 'Actuellement' && $footballMatch->isDeleted() === false) {
                $footballMatches[] = $footballMatch;
            }
        }
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
    #[Route('/api/newfootballmatch', name: 'create_newfootballmatch', methods: ['POST'])]
    public function createNewfootballmatch(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $footballMatch = new FootballMatch();
        $form = $this->createForm(ApiFootballMatchFormType::class, $footballMatch);
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
        $form = $this->createForm(ApiFootballMatchFormType::class,$footballMatch);
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
        $form = $this->createForm(ApiFootballMatchFormType::class,$footballMatch);
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
