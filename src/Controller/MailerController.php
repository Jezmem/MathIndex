<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/email', name: 'email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('mailtrap@mathindex.com')
            ->to('mathindexzsm@gmail.com')
            //->cc('marcusfavernay@gmail.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Le mail magique')
            ->text('Bonjour, je suis le mail magique');
            //->html('<p>See Twig integration for better HTML integration!</p>');
        $mailer->send($email);
        
        return new Response('email envoyé');

    }
}