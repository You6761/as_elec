<?php

namespace App\Controller;

use App\Service\MailService;
use App\Entity\Devis;
use App\Form\DevisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DevisController extends AbstractController
{
  #[Route('/devis', name: 'app_devis')]
  public function index(Request $request, EntityManagerInterface $entityManager, MailService $mailer): Response
  {
    $devis = new Devis();
    $form = $this->createForm(DevisType::class, $devis);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      // Sauvegarde en base de données
      $entityManager->persist($devis);
      $entityManager->flush();

      // $data = $form->getData();
      // $mailer->sendEmail(
      //   'destinataire@example.com',
      //   'Nouveau message de ' . $data['nom'],
      //   '<p>Email: ' . $data['mailClient'] . '</p>'
      // );

      // Ajout du message flash
      $this->addFlash('success', 'Votre demande a bien été envoyée. Notre expert vous contactera sous peu.');

      // Redirection pour éviter la soumission multiple du formulaire
      return $this->redirectToRoute('app_devis');
    }

    return $this->render('home/create.html.twig', [
      'form' => $form,
    ]);
  }
}
