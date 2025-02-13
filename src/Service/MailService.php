<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailService
{
  private MailerInterface $mailer;

  public function __construct(MailerInterface $mailer)
  {
    $this->mailer = $mailer;
  }

  public function sendEmail(string $to, string $subject, string $content)
  {
    $email = (new Email())
      ->from('contact.aselec67@gmail.com')
      ->to($to)
      ->subject($subject)
      ->html($content);

    $this->mailer->send($email);
  }
}
