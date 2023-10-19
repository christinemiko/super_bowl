<?php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Event\RegistrationEvent;
use App\Service\Mailer;

class RegistrationSubscriber implements EventSubscriberInterface
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            RegistrationEvent::NAME => 'onUserRegistered',
        ];
    }

    public function onUserRegistered(RegistrationEvent $event)
    {
        $user = $event->getUser();
        $this->mailer->sendValidationSubscription($user->getEmail(), $user->getToken(), $user);
    }
}
