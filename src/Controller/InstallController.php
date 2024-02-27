<?php
/*********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2025 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 ********************************************************************************/
namespace App\Controller;

use KYG\Modules\Administrations\Resource\ArrayAccess;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\HttpKernel\KernelInterface;
use KYG\Modules\User\Entity\User;
use KYG\Modules\User\Entity\AppInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InstallController extends AbstractController
{
    #[Route('/install/language', name: 'language_install')]
    public function languageInstall(): Response
    {
        $Languages = Yaml::parseFile($this->getParameter('app.extensions.config_dir') . 'languages.yaml');
        return $this->render('install/language.html.twig', [
            'Interface' => $this->getParameter('app.interface'),
            'Languages' => $Languages
        ]);
    }
    #[Route('/install/app', name: 'app_install')]
    public function appInstall(Request $request): Response
    {
        $Language = $request->request->getString('LanguageSetup');
        $Languages = Yaml::parseFile($this->getParameter('app.extensions.config_dir') . 'languages.yaml');
        $var['language_default'] = $Languages[$Language];
        $var['language_default']['laguage'] = $Language;
        $yaml = Yaml::dump($var, 10);
        file_put_contents($this->getParameter('app.extensions.config_dir') . 'var.yaml', $yaml);
        $ArrayAccess = new ArrayAccess;
        return $this->render('install/app.html.twig', [
            'Interface' => $this->getParameter('app.interface'),
            'Themes' => $ArrayAccess->detThemes($Language),
            'Effects' => $ArrayAccess->detEffects($Language),
            'TimeZone' => $ArrayAccess->TimeZone,
            'DataFormat' => $ArrayAccess->DataFormat,
            'TimeFormat' => $ArrayAccess->TimeFormat,
            'Locale' => $Language
        ]);
    }
    #[Route('/install/login', name: 'login_install')]
    public function loginInstall(Request $request): Response
    {
        $var = Yaml::parseFile($this->getParameter('app.extensions.config_dir') . 'var.yaml');
        $var['DataBase']['HostDB'] = $request->request->getString('HostDB');
        $var['DataBase']['PortDB'] = $request->request->getString('PortDB');
        $var['DataBase']['NameDB'] = $request->request->getString('NameDB');
        $var['DataBase']['UserDB'] = $request->request->getString('UserDB');
        $var['DataBase']['PasswordDB'] = $request->request->getString('PasswordDB');
        $var['DateTime']['TimeZone'] = $request->request->getString('TimeZoneSistem');
        $var['DateTime']['DataFormat'] = $request->request->getString('DataSistem');
        $var['DateTime']['TimeFormat'] = $request->request->getString('TimeSistem');
        $var['Interface']['Theme'] = $request->request->getString('ThemeSistem');
        $var['Interface']['Effect'] = $request->request->getString('EffectSistem');
        $yaml = Yaml::dump($var, 10);
        file_put_contents($this->getParameter('app.extensions.config_dir') . 'var.yaml', $yaml);
        return $this->render('install/login.html.twig', [
            'Interface' => $var['Interface'],
            'Locale' => $var['language_default']['laguage']
        ]);
    }
    #[Route('/install/install/{_locale}/', name: 'install')]
    public function install(Request $request, KernelInterface $kernel, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): RedirectResponse
    {
        $var = Yaml::parseFile($this->getParameter('app.extensions.config_dir') . 'var.yaml');
        $app['parameters']['app.timezone'] = $var['DateTime']['TimeZone'];
        $app['parameters']['app.key'] = bin2hex(random_bytes(64));
        $app['parameters']['app.interface']['Theme'] = $var['Interface']['Theme'];
        $app['parameters']['app.interface']['Effect'] = $var['Interface']['Effect'];
        $app['parameters']['app.interface']['LangCKEditor'] = $var['language_default']['LangCKEditor'];
        $app['parameters']['app.interface']['LangData'] = $var['language_default']['LangData'];
        $app['parameters']['app.data.format'] = $var['DateTime']['DataFormat'];
        $app['parameters']['app.time.format'] = $var['DateTime']['TimeFormat'];
        $app['parameters']['app.db.url'] = 'mysql://' . $var['DataBase']['UserDB'] . ':' . $var['DataBase']['PasswordDB'] . '@' . $var['DataBase']['HostDB'] . ':' . $var['DataBase']['PortDB'] . '/' . $var['DataBase']['NameDB'];
        $app['parameters']['app.secret'] = bin2hex(random_bytes(32));
        $app['parameters']['app.default_locale'] = $var['language_default']['laguage'];
        $app['parameters']['app.install'] = true;
        $yaml = Yaml::dump($app, 10);
        file_put_contents($this->getParameter('app.extensions.config_dir') . 'app.yaml', $yaml);
        $twig = Yaml::parseFile($this->getParameter('app.extensions.config_dir') . 'twig.yaml');
        $twig['twig']['format'] = $var['DateTime']['DataFormat'] . ' ' . $var['DateTime']['TimeFormat'];
        $twig['twig']['timezone'] = $var['DateTime']['TimeZone'];
        $yaml = Yaml::dump($twig, 10);
        file_put_contents($this->getParameter('app.extensions.config_dir') . 'twig.yaml', $yaml);
        $filesystem = new Filesystem;
        $filesystem->remove($this->getParameter('app.extensions.config_dir') . 'var.yaml');
        /*$application = new Application($kernel);
        $application->setAutoExit(false);
        $output = new NullOutput;
        $input = new ArrayInput(['command' => 'make:migration']);
        $application->run($input, $output);
        $input = new ArrayInput(['command' => 'doctrine:migrations:migrate']);
        $application->run($input, $output);
        $user = new User;
        $user->setUsername($request->request->getString('Login'));
        $user->setEmail($request->request->getString('Email'));
        $hashedPassword = $passwordHasher->hashPassword($user, $request->request->getString('Password'));
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_SUPERADMIN']);
        $AppInterface = new AppInterface;
        $AppInterface->setEffect($var['Interface']['Effect']);
        $AppInterface->setTheme($var['Interface']['Theme']);
        $AppInterface->setLocale($var['language_default']['laguage']);
        $user->setInterface($AppInterface);
        $entityManager->persist($user);
        $entityManager->persist($AppInterface);
        $entityManager->flush();*/
        return $this->redirectToRoute('home');
    }
}
