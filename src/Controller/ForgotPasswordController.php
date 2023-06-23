<?php

namespace App\Controller;

use App\Service\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ForgotPasswordController extends AbstractController
{

    // FORGOT PASSWORD START
    #[Route('/forgotpassword', name: 'forgotpassword_request')]
    public function ForgotPassword (Request $request, Mailer $mailer): Response
    {
        return $this->render('security/forgotpassword.html.twig');
    }


    // FORGOT PASSWORD END
}