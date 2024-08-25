<?php

namespace App\Modules\Install\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InstallController extends AbstractController
{
    #[Route('/install/index', name: 'install_index')]
    public function index(): Response
    {
        return $this->render('@Install/install/index.html.twig', [
            'controller_name' => 'InstallController',
        ]);
    }
}