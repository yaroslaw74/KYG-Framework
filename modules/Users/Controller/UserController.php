<?php

namespace App\Modules\Users\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user/profile', name: 'user_profile')]
    public function profile(): Response
    {
        return $this->render('@Users/user/profile.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    #[Route('/user/settings', name: 'user_settings')]
    public function settings(): Response
    {
        return $this->render('@Users/user/settings.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
