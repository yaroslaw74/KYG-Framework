<?php
/**********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2025 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 *********************************************************************************/
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InstallController extends AbstractController
{
    #[Route('/install/language', name: 'install_language')]
    public function index(): Response
    {
        return $this->render('install/index.html.twig', [
            'controller_name' => 'InstallController',
        ]);
    }
}