<?php

namespace App\Controller;

use App\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class AdminController extends AbstractController
{
    private $authenticationUtils;
    public function __construct(AuthenticationUtils $authenticationUtils)
    {
        $this->authenticationUtils = $authenticationUtils;
    }
    /**
     * @Route("/login", name="app_login")
     */
    public function login(Request $request)
    {
        // Utilisation du service de sécurité pour vérifier si l'utilisateur est déjà connecté
        $error = $this->authenticationUtils->getLastAuthenticationError();
        $lastUsername = $this->authenticationUtils->getLastUsername();

        return $this->render('admin/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function dashboard()
    {

        // Afficher les informations de l'utilisateur connecté
        return $this->render('admin/dashboard.html.twig');
    }
}
