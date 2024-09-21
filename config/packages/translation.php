<?php
/**********************************************************************************
* @Project    KYG Framework for business
* @Version    1.0.0
*
* @Copyright  (C) 2026 Kataev Yaroslav Georgievich
* @E-mail     yaroslaw74@gmail.com
* @License    GNU General Public License version 3 or later, see LICENSE.md
*********************************************************************************/
use Symfony\Config\FrameworkConfig;

return static function (FrameworkConfig $framework): void
{
    $dir = dirname(__DIR__, 2);
    $path_list = [];

    $list_modules = array_diff(scandir($dir . '/modules'), ['..', '.']);
    $modules = [];
    foreach($list_modules as $name)
    {
        if (is_dir($name))
        {
            $modules = $name;
        }
    }
    if (count($modules) > 0)
    {
        foreach($modules as $name)
        {
            $path = '%kernel.project_dir%/modules/' . $name . '/Resources/translations';
            $path_list = $path;
        }
    }

    $list_additions = array_diff(scandir($dir . '/public/additions'), ['..', '.']);
    $additions = [];
    foreach($list_additions as $name)
    {
        if (is_dir($name))
        {
            $additions = $name;
        }
    }
    if (count($additions) > 0)
    {
        foreach($additions as $name)
        {
            $path = '%kernel.project_dir%/public/additions/' . $name . '/Resources/translations';
            $path_list = $path;
        }
    }

    $framework->translator()->paths($path_list);
};