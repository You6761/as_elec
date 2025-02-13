<?php

namespace App\Controller;

use App\Service\MailService;
use App\Entity\Devis;
use App\Form\DevisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class DevisController extends AbstractController
{
  #[Route('/devis', name: 'app_devis')]
  public function create(Request $request, EntityManagerInterface $entityManager, MailService $mailer): Response
  {
    $devis = new Devis();
    $form = $this->createForm(DevisType::class, $devis);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      dd("ok");
      $entityManager->persist($devis);
      $entityManager->flush();

      // 📧 Email de confirmation au client
      /*$emailClient = (new Email())
        ->from('contact.aselec67@gmail.com') // Expéditeur
        ->to($devis->getmailClient()) // Destinataire   (le client)
        ->subject('Confirmation de votre demande de devis')
        ->html("
                    <p>Bonjour <strong>{$devis->getNom()}</strong>,</p>
                    <p>Nous avons bien reçu votre demande de devis. Un expert vous contactera sous peu.</p>
                    <p><strong>Détails de votre demande :</strong></p>
                    <ul>
                        <li><strong>Description :</strong> {$devis->getDescriptionTravaux()}</li>
                        <li><strong>Date :</strong> {$devis->getDateCreation()->format('d/m/Y')}</li>
                    </ul>
                    <p>Merci de votre confiance.</p>
                ");

      $mailer->send($emailClient);

      // 📧 Email au service Aselec67 pour garder une trace
      $emailAdmin = (new Email())
        ->from('contact.aselec67@gmail.com') // Expéditeur
        ->to('contact.aselec67@gmail.com') // Destinataire (vous)
        ->subject('Nouveau devis reçu')
        ->html("
                    <p><strong>Un nouveau devis a été soumis :</strong></p>
                    <ul>
                        <li><strong>Nom :</strong> {$devis->getNom()}</li>
                        <li><strong>Prénom :</strong> {$devis->getPrenom()}</li>
                        <li><strong>Ville :</strong> {$devis->getVille()}</li>
                        <li><strong>Adresse :</strong> {$devis->getAdresse()}</li>
                        <li><strong>Téléphone :</strong> {$devis->getNumero()}</li>
                        <li><strong>Description des travaux :</strong> {$devis->getDescriptionTravaux()}</li>
                        <li><strong>Type d'habitat :</strong> {$devis->getTypeHabitat()}</li>
                        <li><strong>Estimation des travaux :</strong> {$devis->getEstimationTravaux()}</li>
                        <li><strong>Plus de détails :</strong> {$devis->getPlusDeDetails()}</li>
                        <li><strong>Date :</strong> {$devis->getDateCreation()->format('d/m/Y H:i')}</li>
                    </ul>
                    <p>Merci de prendre en charge cette demande.</p>
                ");

      $mailer->send($emailAdmin); */
      $data = $form->getData();
      $mailer->sendEmail(
        'destinataire@example.com',
        'Nouveau message de ' . $data['nom'],
        '<p>Email: ' . $data['email'] . '</p>'
      );

      // ✅ Message flash de confirmation
      $this->addFlash('success', 'Votre demande a bien été envoyée. Un expert vous contactera sous peu.');

      return $this->redirectToRoute('app_devis');
    }

    return $this->render('home/create.html.twig', [
      'form' => $form,
    ]);
  }
}
