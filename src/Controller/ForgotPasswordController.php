<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ForgotPasswordFormType;
use App\Form\RegistrationFormType;
use App\Form\ResetPasswordFormType;
use App\Repository\UserRepository;
use App\Service\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ForgotPasswordController extends AbstractController
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    #[Route('/forgotpassword', name: 'forgotpassword_request')]
    public function ForgotPassword(Request $request, Mailer $mailer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ForgotPasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();
            $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

            if (!$user) {
                $this->addFlash('error', 'Aucun utilisateur n\'a été trouvé avec cet email.');
                return $this->redirectToRoute('inscription');
            }

            $user->setToken($this->generateToken());
            $entityManager->persist($user);
            $entityManager->flush();

            // SEND EMAIL SERVICE MAILER FOR FORGOT PASSWORD START

            $this->mailer->sendResetPasswordEmail($user->getEmail(), $user->getToken(), $user);

            return $this->redirectToRoute('app_login');

            // SEND EMAIL SERVICE MAILER FOR FORGOT PASSWORD END
            }
            return $this->render('security/forgotpassword.html.twig',
                ['form' => $form->createView(),]);
        }



    // FORGOT PASSWORD END

    #[Route('/resetpassword', name: 'resetpassword_request')]
    public function resetPassword(Request $request,EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher,): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(ResetPasswordFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle form submission, e.g., persist user entity, flush entity manager, etc.
            // encode the plain password

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('accueil');
        }

        return $this->render('security/resetpassword.html.twig', [
            'resetpasswordForm' => $form->createView(),
        ]);
    }
    // GENERATE TOKEN START

    private function generateToken()
    {
        return rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');

        //signifie ceci ligne dessous:
        //return rtrim(strtr(base64_encode(random_bytes(length:32)), '+/', '-_'), charlist: '=');
    }
    // GENERATE TOKEN END
}