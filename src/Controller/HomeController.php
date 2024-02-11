<?php
/**********************************************************************************
 * @Project    KYG Framework
 * @Version    1.0
 * @Data       11.02.2024
 *
 * @Copyright  (C) 2024 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 *********************************************************************************/
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;

class HomeController extends AbstractController
{
    private $Interface = [
        'Theme' => 'start'
    ];
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $filesystem = new Filesystem();
        if (!$filesystem->exists($this->getParameter('app.config_dir') . DIRECTORY_SEPARATOR . 'db_config.yaml'))
            return $this->redirectToRoute('app_install');
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('home/index.html.twig', [
            'Interface' => $this->Interface
        ]);
    }
}
