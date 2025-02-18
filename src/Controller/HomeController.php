<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('contact.html.twig', [
            'controller_name' => 'HomeController',
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
