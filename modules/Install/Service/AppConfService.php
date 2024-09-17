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
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Yaml\Yaml;

class AppConfService
{
    public function __construct(
        private ArrayAccessService $ArrayAccess,
        private ContainerBagInterface $params,
        private KernelInterface $kernel
    ) {}
    public function ConsoleComand(string $comand): void
    {
        $application = new Application($this->kernel);
        $application->setAutoExit(false);
        $input = new ArrayInput(['command' => $comand]);
        $output = new NullOutput();
        $application->run($input, $output);
    }
    public function setParametr(string $Parametr, string $ParameterName): void
    {
        if (($Parametr != '') and ($Parametr != $this->params->get($ParameterName)))
        {
            $File = $this->params->get('app.config_dir') . '/parameters.yaml';
            $translation = Yaml::parseFile($File);
            $translation['parameters'][$ParameterName] = $Parametr;
            $yaml = Yaml::dump($translation, 10);
            file_put_contents($File, $yaml);
        }
    }
    public function setDateTime(string $DataFormat, string $TimeFormat, string $Separator = ' '): void
    {
        $this->setParametr($DataFormat, 'app.dataformat');
        $this->setParametr($TimeFormat, 'app.timeformat');
        $this->setParametr($Separator, 'app.separator');
        $DateTimeFormat = $this->ArrayAccess->DataFormat[$DataFormat]['format'] . $Separator . $this->ArrayAccess->TimeFormat[$TimeFormat]['format'];
        $this->setParametr($DateTimeFormat, 'app.datatimeformat');
    }
}