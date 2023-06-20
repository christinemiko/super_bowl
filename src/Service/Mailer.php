<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;


class Mailer

{
    /**
     * @var MailerInterface
     */
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail($email, $token, $user)
    {
        // SEND EMAIL FOR CONFIRMATION SUBSCRIPTION START

        $templatedEmail = (new TemplatedEmail())
            ->from('noreply@superbowl.com')
            ->to(new Address($email))
            ->subject('Validation Inscription Super Bowl!')

            // path of the Twig template to render
            ->htmlTemplate('emails/signup.html.twig')

            // pass variables (name => value) to the template
            ->context([
                'expiration_date' => new \DateTime('+7 days'),
                'token' => $token,
                'user' => $user,
            ])
        ;

        $this->mailer->send($templatedEmail);
        // SEND EMAIL FOR CONFIRMATION SUBSCRIPTION END
    }
    public function sendTemplatedEmail(TemplatedEmail $templatedEmail)
    {
        $this->mailer->send($templatedEmail);
    }
}
