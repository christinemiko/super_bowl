<?php

namespace App\EventSubscriber;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class UserEntitySubscriber implements EventSubscriberInterface

{
    private $passwordHasher;
    private $requestStack;

    public function __construct(UserPasswordHasherInterface $passwordHasher,  RequestStack $requestStack)
    {
        $this->passwordHasher = $passwordHasher;
        $this->requestStack = $requestStack;
    }

    public static function getSubscribedEvents():array
    {
        return [
            BeforeEntityPersistedEvent::class => ['setUserData']
        ];
    }

    public function setUserData(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof User)) {
            return;
        }

        $password = $entity->getPassword();
        $hashedPassword = $this->passwordHasher->hashPassword($entity, $password);
        $entity->setPassword($hashedPassword);

        // Récupération des rôles depuis la requête
         $roles = $entity->getRoles();

        // Attribution des rôles à l'utilisateur
        $entity->setRoles($roles);

        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        $entity->setRoles($roles);
    }
}
