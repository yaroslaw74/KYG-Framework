<?php
/**********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0,0
 *
 * @Copyright  (C) 2025 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 *********************************************************************************/
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): RedirectResponse
    {
        if ($this->getParameter('app.install'))
            return $this->redirectToRoute('language_install');
        else
            return $this->redirectToRoute('home');
    }
    #[Route('/home', name: 'home')]
    public function home(Request $request): Response
    {
        return $this->render('home/index.html.twig', [
        ]);
    }

}
