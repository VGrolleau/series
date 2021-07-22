<?php


namespace App\Notification;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\User\UserInterface;

class Sender
{

    protected $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendNewUserNotificationToAdmin(UserInterface $user)
    {
        // pour tester
        // file_put_contents('debug.txt', $user->getEmail());

        $message = new Email();
        $message
            ->from('test@virginiegrolleau.com')
//            ->to('virginie.grolleau.vg@gmail.com')
            ->to('contact@virginiegrolleau.com')
            ->subject('new account created on series.com')
            ->html('<h1>New account!!</h1> email : ' . $user->getEmail());

        $this->mailer->send($message);
    }

}