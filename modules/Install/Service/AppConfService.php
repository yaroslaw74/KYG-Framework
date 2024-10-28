<?php
/********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2026 Kataev Yaroslav Georgievich
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE.md
 ********************************************************************************/
namespace App\Modules\Install\Service;

use App\Modules\Install\Service\ArrayAccessService;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Yaml\Yaml;

class AppConfService
{
    public function __construct(
        private ArrayAccessService $ArrayAccess,
        private ContainerBagInterface $params,
        private KernelInterface $kernel
    ) {
    }
    public function ConsoleComand(string $comand): Response
    {
        $application = new Application($this->kernel);
        $application->setAutoExit(false);
        $input = new ArrayInput(['command' => $comand]);
        $output = new NullOutput();
        $application->run($input, $output);
        return new Response("");
    }

    public function setDateTime(string $DataFormat, string $TimeFormat, string $Separator = ' '): void
    {
        $file = $this->params->get('app.config_dir') . '/parameters.yaml';
        $parameters = Yaml::parseFile($file);
        $parameters['parameters']['app.data_format'] = $DataFormat;
        $parameters['parameters']['app.time_format'] = $TimeFormat;
        $parameters['parameters']['app.data_time_separator'] = $Separator;
        $yaml = Yaml::dump($parameters, 10);
        file_put_contents($file, $yaml);

        $DataTimeFormat = $DataFormat . $Separator . $TimeFormat;
        $file = $this->params->get('app.config_dir') . '/twig.yaml';
        $twig = Yaml::parseFile($file);
        $twig['twig']['date']['format'] = $DataTimeFormat;
        $yaml = Yaml::dump($twig, 10);
        file_put_contents($file, $yaml);
    }
}