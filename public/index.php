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
use App\Kernel;

require_once dirname(__DIR__) . '/public/start.php';
require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};