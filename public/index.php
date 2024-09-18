<?php
/**********************************************************************************
* @Project    KYG Framework for business
* @Version    1.0.0
*
* @Copyright  (C) 2026 Kataev Yaroslav Georgievich
* @E-mail     yaroslaw74@gmail.com
* @License    GNU General Public License version 3 or later, see LICENSE.md
*********************************************************************************/
use App\Kernel;
use App\Modules\Install\Resources\Start;

$dir = dirname(__DIR__);
require_once($dir . '/vendor/autoload_runtime.php');

$start = new Start($dir);
$start->StartApp();

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};