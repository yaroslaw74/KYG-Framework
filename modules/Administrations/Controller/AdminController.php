<?php

namespace App\Modules\Administrations\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin/index', name: 'admin_index')]
    public function index(): Response
    {
        return $this->render('@Administrations/admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
