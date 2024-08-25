<?php
/********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2025 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 ********************************************************************************/
namespace App\Modules\Install\Service;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

class AppConfService
{
    public function __construct(private KernelInterface $kernel) {}
    public function ConsoleComand(string $comand): Response 
    {
        $application = new Application($this->kernel);
        $application->setAutoExit(false);
        $input = new ArrayInput(['command' => $comand]);
        $output = new NullOutput();
        $application->run($input, $output);
        return new Response("");
    }
}