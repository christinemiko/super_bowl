<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\AppLoginAuthenticator;
use App\Service\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Mailer\MailerInterface;

class RegistrationController extends AbstractController
{

    private $mailer;
    private $userRepository;

    public function __construct(Mailer $mailer, UserRepository$userRepository)
    {
        $this->mailer = $mailer;
        $this->userRepository = $userRepository;
    }


    #[Route('/inscription', name: 'inscription')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppLoginAuthenticator $authenticator, EntityManagerInterface $entityManager ): Response
    {

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);

            if ($existingUser) {
                // L'utilisateur avec cette adresse e-mail existe déjà, affiche un message d'erreur approprié
                $this->addFlash('error', 'Cette adresse e-mail est déjà utilisée.');
                return $this->redirectToRoute('app_login'); // Redirige vers le formulaire d'inscription

            }
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $user->setRoles(['ROLE_CLIENT']);
            $user->setEnable(false);
            $user->setToken($this->generateToken());

            $entityManager->persist($user);
            $entityManager->flush();

            // SEND EMAIL SERVICE MAILER FOR CONFIRMATION SUBSCRIPTION START

            $this->mailer->sendEmail($user->getEmail(), $user->getToken(), $user);

            // SEND EMAIL SERVICE MAILER FOR CONFIRMATION SUBSCRIPTION END

            return $this->redirectToRoute('app_login'); // Redirige vers le formulaire de connexion
            // do anything else you need here, like send an email

        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'user' => $user,
        ]);
    }

    // FUNCTION CONFIRM ACCOUNT TOKEN START

    #[Route('/confirmAccount/{token}', name: 'confirmAccount')]
    public function confirmAccount(string $token, EntityManagerInterface $entityManager)
    {
        $user = $this->userRepository->findOneBy(["token" =>$token]);

        if($user) {
            $user->setToken(null);
            $user->setEnable(true);
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute("accueil");
        } else {
            $this->addFlash('error', 'Vous n\'avez pas validé votre inscription.');
            return $this->redirectToRoute("app_login");
        }
    }

    // FUNCTION CONFIRM ACCOUNT TOKEN END

    // GENERATE TOKEN START

    private function generateToken()
    {
        return rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');

        //signifie ceci ligne dessous:
        //return rtrim(strtr(base64_encode(random_bytes(length:32)), '+/', '-_'), charlist: '=');
    }
    // GENERATE TOKEN END



}