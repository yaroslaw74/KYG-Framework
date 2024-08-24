<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InstallController extends AbstractController
{
    #[Route('/install/index', name: 'install_index')]
    public function index(): Response
    {
        return $this->render('install/index.html.twig', [
            'controller_name' => 'InstallController',
        ]);
    }
}
