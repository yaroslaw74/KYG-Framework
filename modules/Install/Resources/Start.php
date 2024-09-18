<?php
/********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2026 Kataev Yaroslav Georgievich
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE.md
 ********************************************************************************/
namespace App\Modules\Install\Resources;

use Symfony\Component\Filesystem\Filesystem;

class Start
{
    private string $public;
    private string $install;
    private string $config;
    public function __construct(private string $dir)
    {
        $this->public = $this->dir . '/public';
        $this->install = $this->dir . '/modules/Install/Resources/config';
        $this->config = $this->public . '/config';
    }
    public function StartApp(): void
    {
        $filesystem = new Filesystem();
        if (!$filesystem->exists($this->public . '/additions'))
            $filesystem->mkdir($this->public . '/additions', 0777);
        if (!$filesystem->exists($this->public . '/media'))
            $filesystem->mkdir($this->public . '/media', 0777);
        if (!$filesystem->exists($this->public . '/translations'))
            $filesystem->mkdir($this->public . '/translations', 0777);
        if (!$filesystem->exists($this->public . '/config'))
        {
            $filesystem->mkdir($this->config , 0777);
            $filesystem->mirror($this->install, $this->config);
        }
    }
}