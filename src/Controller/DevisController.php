<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Form\DevisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DevisController extends AbstractController
{
  #[Route('/devis', name: 'app.devis')]
  public function create(Request $request, EntityManagerInterface $entityManager): Response
  {
    $devis = new Devis();
    $form = $this->createForm(DevisType::class, $devis);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager->persist($devis);
      $entityManager->flush();

      $this->addFlash('success', 'Le devis a été créé avec succès !');
      return $this->redirectToRoute('devis_create');
    }

    return $this->render('create.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
