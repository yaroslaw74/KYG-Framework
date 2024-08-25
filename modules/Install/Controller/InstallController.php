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
use App\Modules\Install\Service\AppConfService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InstallController extends AbstractController
{
    public function __construct(
        private ArrayAccessService $ArrayAccess,
        private AppConfService $AppConf
    ) {}
    
    #[Route('/install/language', name: 'install_language')]
    public function language(Request $request): Response
    {
        $this->AppConf->ConsoleComand('importmap:update');
        $this->AppConf->ConsoleComand('asset-map:compile');
        return $this->render('@Install/install/language.html.twig', [
            'Languages' => $this->ArrayAccess->getLanguages($request->getLocale()),
        ]);
    }
}