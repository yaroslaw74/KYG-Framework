<?php
/********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2026 Kataev Yaroslav Georgievich
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE.md
 ********************************************************************************/
namespace App\Modules\Install\Controller;

use App\Modules\Install\Service\ArrayAccessService;
use App\Modules\Install\Service\AppConfService;
use App\Modules\User\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Yaml\Yaml;
use Symfony\Contracts\Translation\TranslatorInterface;
use PDO;
use PDOException;

class InstallController extends AbstractController
{
    public function __construct(
        private ArrayAccessService $ArrayAccess,
        private AppConfService $AppConf,
        private TranslatorInterface $translator
    ) {}

    #[Route('/install/language', name: 'install_language')]
    public function language(Request $request): Response
    {
        $this->AppConf->ConsoleComand('asset-map:compile');
        return $this->render('@Install/install/language.html.twig', [
            'Languages' => $this->ArrayAccess->getLanguages($request->getLocale()),
        ]);
    }
     #[Route('/install/requirements', name: 'requirements_install')]
    public function requirements(Request $request): Response
    {
        $this->AppConf->setParametr($request->request->getString('_locale'), 'app.locale');
        $error = false;
        $LoadedExtensions = get_loaded_extensions();
        $php = version_compare(PHP_VERSION, '8.3', '<');
        if ($php) {
            $error = $this->translator->trans('install.error.php', [], 'install');
        } else {
            $extensions = $this->ArrayAccess->getExtensions();
            $diff = array_diff($extensions['required'], $LoadedExtensions);
            if (count($diff) != 0) {
                $error = $this->translator->trans('install.error.ext', [], 'install');
            } else {
                if (session_status() == PHP_SESSION_DISABLED) {
                    $error = $this->translator->trans('install.error.session.disabled', [], 'install');
                } else {
                    if (ini_get('session.auto_start'))
                        $error = $this->translator->trans('install.error.session.autostart', [], 'install');
                }
            }
        }
        return $this->render('@Install/install/requirements.html.twig', [
            'error' => $error,
            'php_version' => phpversion(),
            'php' => $php,
            'loaded_extensions' => $LoadedExtensions,
            'extensions' => $extensions
        ]);
    }
    #[Route('/install/app', name: 'app_install')]
    public function AppInstall(): Response
    {
        return $this->render('@Install/install/app.html.twig', [
            'error' => null,
            'uri' => $_COOKIE['APP_URI'],
            'HostDB' => 'localhost',
            'PortDB' => '3306',
            'NameDB' => '',
            'UserDB' => '',
            'PassDB' => '',
            'TimeZone' => $this->ArrayAccess->getTimeZone(),
            'TimeZoneDefault' => date_default_timezone_get(),
            'DataFormat' => $this->ArrayAccess->DataFormat,
            'DataFormatDefault' => '',
            'TimeFormat' => $this->ArrayAccess->TimeFormat,
            'TimeFormatDefault' =>''
        ]);
    }
    #[Route('/install/login', name: 'login_install')]
    public function LoginInstall(Request $request): Response
    {
        $HostDB = $request->request->getString('HostDB');
        $PortDB = $request->request->getString('PortDB');
        $NameDB = $request->request->getString('NameDB');
        $UserDB = $request->request->getString('UserDB');
        $PassDB = $request->request->getString('PassDB');
        try {
            $dbh = new PDO('mysql:host=' . $HostDB . ';dbname=' . $NameDB, $UserDB, $PassDB);
        } catch (PDOException) {
            return $this->render('@/Install/install/app.html.twig', [
                'error' => $this->translator->trans('install.error.db', [], 'install'),
                'uri' => $request->request->getString('uri'),
                'HostDB' => $HostDB,
                'PortDB' => $PortDB,
                'NameDB' => $NameDB,
                'UserDB' => $UserDB,
                'PassDB' => $PassDB,
                'TimeZone' => $this->ArrayAccess->getTimeZone(),
                'TimeZoneDefault' => $request->request->getString('TimeZone'),
                'DataFormat' => $this->ArrayAccess->DataFormat,
                'DataFormatDefault' => $request->request->getString('DataFormat'),
                'TimeFormat' => $this->ArrayAccess->TimeFormat,
                'TimeFormatDefault' => $request->request->getString('TimeFormat')
            ]);
        }
        $serverVersion = $dbh->getAttribute(PDO::ATTR_SERVER_VERSION);
        $env['vars']['DATABASE_URL'] = 'mysql://' . $UserDB . ':' . $PassDB . '@' . $HostDB . ':' . $PortDB . '/' . $NameDB . '?serverVersion=' . $serverVersion . '&charset=utf8mb4';
        $env['vars']['APP_SECRET'] = bin2hex(random_bytes(32));
        $env['vars']['DEFAULT_URI'] = rtrim($request->request->getString('uri'), " \n\r\t\0\v\x00/");
        $yamlenv = Yaml::dump($env, 10);
        file_put_contents($this->getParameter('app.var_dir') . '/env.yaml', $yamlenv);
        $this->AppConf->setParametr($request->request->getString('TimeZone'), 'app.timezone');
        $this->AppConf->setDateTime($request->request->getString('DataFormat'), $request->request->getString('TimeFormat'));
        return $this->render('@Install/install/login.html.twig');
    }
    #[Route('/install/install', name: 'install')]
    public function UserInstall(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): RedirectResponse
    {
        $this->AppConf->ConsoleComand('make:migration');
        $this->AppConf->ConsoleComand('doctrine:migrations:migrate');
        $user = new User;
        $user->setUsername($request->request->getString('User'));
        $user->setEmail($request->request->getString('Email'));
        $user->setRoles(['ROLE_SUPERADMIN']);
        $hashedPassword = $passwordHasher->hashPassword($user, $request->request->getString('Password'));
        $user->setPassword($hashedPassword);
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->redirectToRoute('index');
    }
}