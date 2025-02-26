<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\FirebaseService;
use App\Form\ContactType;

final class HomeController extends AbstractController
{
    private FirebaseService $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }
    #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->firebaseService->addcontact($data['name'], $data['email'], $data['message']);

            $response = $this->contact->request(
                'POST',
                'https://aselec-5880b-default-rtdb.europe-west1.firebasedatabase.app/',
                [
                    'json' => [
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'message' => $data['message'],
                    ],
                ]

            );
            return $this->redirectToRoute('app_contact');
        }
        return $this->render('contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/service', name: 'app_service')]
    public function service(): Response
    {
        return $this->render('service.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/acceuil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/realisation', name: 'app_realisation')]
    public function realisation(): Response
    {
        return $this->render('home/realisation.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/engagement', name: 'app_engagement')]
    public function engagement(): Response
    {
        return $this->render('engagement.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/', name: 'home_acceuil')]
    public function acceuil(): Response
    {
        return $this->render('home/acceuil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('home/login.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
