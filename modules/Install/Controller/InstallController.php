<?php
/********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2025 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 ********************************************************************************/
namespace App\Modules\Install\Controller;

use App\Modules\Install\Service\ArrayAccessService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InstallController extends AbstractController
{
    public function __construct(
        private ArrayAccessService $ArrayAccess,
    ) {}
    
    #[Route('/install/index', name: 'install_index')]
    public function index(Request $request): Response
    {
        return $this->render('@Install/install/index.html.twig', [
            'Languages' => $this->ArrayAccess->getLanguages($request->getLocale()),
        ]);
    }
}