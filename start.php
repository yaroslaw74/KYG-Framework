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
if (!file_exists($dir . DIRECTORY_SEPARATOR . 'migrations'))
    mkdir($dir . DIRECTORY_SEPARATOR . 'migrations');
$public = $dir . DIRECTORY_SEPARATOR . 'public';
if (!file_exists($public . DIRECTORY_SEPARATOR . 'additions'))
    mkdir($public . DIRECTORY_SEPARATOR . 'additions');
if (!file_exists($public . DIRECTORY_SEPARATOR . 'media'))
    mkdir($public . DIRECTORY_SEPARATOR . 'media');
if (!file_exists($public . DIRECTORY_SEPARATOR . 'translations'))
    mkdir($public . DIRECTORY_SEPARATOR . 'translations');
$config = $public . DIRECTORY_SEPARATOR . 'config';
$install = $dir . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'Install' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'config';
if (!file_exists($config)) {
    mkdir($config);
    $file = array_diff(scandir($install), ['..', '.']);
    foreach($file as $name)
    {
        copy($install . DIRECTORY_SEPARATOR . $name, $config . DIRECTORY_SEPARATOR . $name);
    }
}