<?php
/*********************************************************************************
 * @Project    KYG Framework
 * @Version    1.0
 * @Data       11.02.2024
 *
 * @Copyright  (C) 2024 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 ********************************************************************************/
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

class InstallController extends AbstractController
{
    private $Interface = array();
    #[Route('/install', name: 'app_install')]
    public function index(): Response
    {
        $this->Interface = Yaml::parseFile($this->getParameter('app.config_dir') . DIRECTORY_SEPARATOR . 'default.yaml');
        return $this->render('install/index.html.twig', [
            'Interface' => $this->Interface['Interface']
        ]);
    }
}
