<?php

/**********************************************************************************
 * @Project    KYG Framework for Business
 * @Version    1.0.0
 *
 * @Copyright  (C) Kataev Yaroslav
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE.md
 *********************************************************************************/
$dir = dirname(__FILE__);

if (file_exists($dir.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'jawira')) {
    exec('php bin/console doctrine:diagram:er');
    exec('php bin/console doctrine:diagram:class');
}

if (file_exists($dir.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'friendsofphp')) {
    exec('cd vendor/bin');
    exec('php-cs-fixer fix');
    exec('php-cs-fixer fix src');
    exec('php-cs-fixer fix modules');
    exec('php-cs-fixer fix tests');
    exec('php-cs-fixer fix public');
}
