<?php
/**********************************************************************************
* @Project    KYG Framework for business
* @Version    1.0.0
*
* @Copyright  (C) 2026 Kataev Yaroslav Georgievich
* @E-mail     yaroslaw74@gmail.com
* @License    GNU General Public License version 3 or later, see LICENSE.md
*********************************************************************************/
$dir = dirname(__FILE__);

$migrations = $dir . DIRECTORY_SEPARATOR . 'migrations';
if (!file_exists($migrations))
{
     mkdir($migrations);
}

$public = $dir . DIRECTORY_SEPARATOR . 'public';

$additions = $public . DIRECTORY_SEPARATOR . 'additions';
if (!file_exists($additions))
{
     mkdir($additions);
}

$media = $public . DIRECTORY_SEPARATOR . 'media';
if (!file_exists($media))
{
     mkdir($media);
}

$translations = $public . DIRECTORY_SEPARATOR . 'translations';
if (!file_exists($translations))
{
     mkdir($translations);
}

$config = $public . DIRECTORY_SEPARATOR . 'config';
if (!file_exists($config))
{
    mkdir($config);
    $install = $dir . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'Install' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'config';
    $file = array_diff(scandir($install), ['..', '.']);
    foreach($file as $name)
    {
          if (!file_exists($config . DIRECTORY_SEPARATOR . $name))
          {
               copy($install . DIRECTORY_SEPARATOR . $name, $config . DIRECTORY_SEPARATOR . $name);
          }
     }
}