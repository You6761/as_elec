<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\FirebaseService;
use Doctrine\ORM\EntityManagerInterface;

final class HomeController extends AbstractController
{
    private FirebaseService $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, EntityManagerInterface $em, FirebaseService $firebaseService): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarde dans la base de données locale
            //$em->persist($contact);
            //$em->flush();

            // Préparez les données à envoyer à Firebase
            $data = [
                'name'    => $contact->getName(),
                'email'   => $contact->getEmail(),
                'message' => $contact->getMessage(),
            ];

            // Envoi des données à Firebase
            $firebaseService->sendContactData($data);

            $this->addFlash('success', 'Votre message a bien été envoyé et enregistré sur Firebase.');

            return $this->redirectToRoute('app_contact');
        }
        return $this->render('contact.html.twig', [
            'form' => $form,
        ]);
    }
    #[Route('/service', name: 'app_service')]
    public function service(): Response
    {
        return $this->render('service.html.twig');
    }
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/accueil.html.twig');
    }
    #[Route('/realisation', name: 'app_realisation')]
    public function realisation(): Response
    {
        return $this->render('home/realisation.html.twig');
    }
    #[Route('/engagement', name: 'app_engagement')]
    public function engagement(): Response
    {
        return $this->render('engagement.html.twig');
    }

    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('home/login.html.twig');
    }
}
