<?php

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Form\ApiLoginFormType;
use App\Entity\User;


class ApiSecurityController extends AbstractController
{
    #[Route(path:'/api/login', name: 'api_app_login', methods: ['POST'])]
    public function loginCheck(Request $request, UserProviderInterface $userProvider, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        // Créer une instance du formulaire ApiLoginFormType
        $user = new User();
        $form = $this->createForm(ApiLoginFormType::class, $user);

        // Soumettre le formulaire et récupérer les données
        $form->handleRequest($request);

        // Vérifier si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {

            // Récupérer les données du formulaire
            $email = $form->get('email')->getData();
            $password = $form->get('password')->getData();

            // Vérifier si l'utilisateur existe en base de données
            $user = $userProvider->loadUserByIdentifier($email);
            if (!$user) {
                return new JsonResponse(['error' => 'User not found'], 400);
            }

            // Vérifier si le mot de passe est valide
            if (!$passwordHasher->isPasswordValid($user, $password)) {
                return new JsonResponse(['error' => 'Invalid credentials'], 400);
            }

            // Les informations d'identification sont valides, vous pouvez poursuivre avec le traitement
            // ...

            return new JsonResponse(['User connected' => 'ok'], 200);
        }

        // Le formulaire n'est pas soumis ou n'est pas valide
        return new JsonResponse(['error' => 'Invalid form data'], 400);
    }
}



