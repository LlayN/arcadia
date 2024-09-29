<?php

namespace App\EventSubscriber;



use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class EasyAdminSubscriber implements EventSubscriberInterface
{
  private $passwordHasher;
  private $mailer;
  private $requestStack;

  public function __construct(UserPasswordHasherInterface $passwordHasher, MailerInterface $mailer, RequestStack $requestStack)
  {
    $this->passwordHasher = $passwordHasher;
    $this->mailer = $mailer;
    $this->requestStack = $requestStack;
  }

  public static function getSubscribedEvents(): array
  {
    return [
      BeforeEntityPersistedEvent::class => [
        ['setPassword', 1],
        ['sendMail', 2]
      ],
      BeforeEntityUpdatedEvent::class => ['setPassword'],
    ];
  }

  public function setPassword($event): void
  {
    $entity = $event->getEntityInstance();

    if (!($entity instanceof User)) {
      return;
    }

    $password = $entity->getPassword();

    if (!$this->isPasswordHashed($password)) {
      $hashedPassword = $this->passwordHasher->hashPassword(
        $entity,
        $password
      );
      $entity->setPassword($hashedPassword);
    }

  }

  public function isPasswordHashed($password)
  {
    if (preg_match('/^\$2y\$/', $password) && strlen($password) === 60) {
      return true;
    }
  }

  public function sendMail($event): void
  {
    $request = $this->requestStack->getCurrentRequest()->request->all();
     
    if (array_key_exists('User', $request)) {

      $entity = $event->getEntityInstance();

      $email = (new Email())
        ->from('admin@arcadia.fr')
        ->to($entity->getEmail())
        ->subject('Création de votre compte')
        ->text('Votre compte a bien été créé, votre adresse mail pour vous connecter est : ' . $entity->getEmail() . 'Merci de vous rapprocher de l\'administrateur pour obtenir votre mot de passe');

      $this->mailer->send($email);
    } else {
      return;
    }
  }
}