<?php
/**********************************************************************************
* @Project    KYG Framework for business
* @Version    1.0.0
*
* @Copyright  (C) 2025 Kataev Yaroslav Georgievich
* @E-mail     yaroslaw74@gmail.com
* @License    GNU General Public License version 3 or later;
see LICENSE.md
*********************************************************************************/
$path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public';
if (!file_exists($path . DIRECTORY_SEPARATOR . 'images')) mkdir($path . DIRECTORY_SEPARATOR . 'images', 0777);
if (!file_exists($path . DIRECTORY_SEPARATOR . 'extensions')) mkdir($path . DIRECTORY_SEPARATOR . 'extensions', 0777);
$config = $path . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'parameters.yaml';
if (!file_exists($config)) {
    mkdir($path . DIRECTORY_SEPARATOR . 'config', 0777);
    copy($path . DIRECTORY_SEPARATOR . 'parameters.yaml.inc', $config);
}