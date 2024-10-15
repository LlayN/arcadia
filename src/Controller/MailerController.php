<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerController extends AbstractController
{
    private $mailer;
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail($parameter)
    {
        $email = (new Email())
            ->from($parameter['mail'])
            ->to('contact@arcadia.fr')
            ->subject($parameter['title'])
            ->text($parameter['description']);

        $this->mailer->send($email);
    }
}