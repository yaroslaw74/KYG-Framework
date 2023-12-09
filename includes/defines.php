<?php
/****************************************************************************************
 * @Project    KYG Framework
 * @Version    1.0
 * @Data       01.01.2024 г.
 *
 * @Copyright  (C) 2024 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.txt
 ***************************************************************************************/

// Определите минимальную поддерживаемую версию PHP приложения как константу, чтобы на нее можно было ссылаться в приложении.
define('KYG_MINIMUM_PHP', '7.1.0'); 

//Корневая папка
define('KYG_PATH_BASE', dirname(__DIR__, 1) . DIRECTORY_SEPARATOR);

//Закрытые папки
define('KYG_PATH_APP', KYG_PATH_BASE . 'app' . DIRECTORY_SEPARATOR);
define('KYG_PATH_CACHE', KYG_PATH_BASE . 'cache' . DIRECTORY_SEPARATOR);
define('KYG_PATH_CONFIG', KYG_PATH_BASE . 'config' . DIRECTORY_SEPARATOR);
define('KYG_PATH_EXTERNAL', KYG_PATH_BASE . 'external' . DIRECTORY_SEPARATOR);
define('KYG_PATH_INCLUDES', KYG_PATH_BASE . 'includes' . DIRECTORY_SEPARATOR);
define('KYG_PATH_TEMPLATES', KYG_PATH_BASE . 'templates' . DIRECTORY_SEPARATOR);
define('KYG_PATH_TEMPLATES_C', KYG_PATH_BASE . 'templates_c' . DIRECTORY_SEPARATOR);

//Окрытые папки
define('KYG_PATH_PUBLIC', KYG_PATH_BASE . 'public' . DIRECTORY_SEPARATOR);
define('KYG_PATH_COMPONENTS', KYG_PATH_PUBLIC . 'components' . DIRECTORY_SEPARATOR);
define('KYG_PATH_LANGUAGES', KYG_PATH_PUBLIC . 'languages' . DIRECTORY_SEPARATOR);
define('KYG_PATH_LIBRARIES', KYG_PATH_PUBLIC . 'libraries' . DIRECTORY_SEPARATOR);
define('KYG_PATH_MODULES', KYG_PATH_PUBLIC . 'modules' . DIRECTORY_SEPARATOR);
define('KYG_PATH_PLUGINS', KYG_PATH_PUBLIC . 'plugins' . DIRECTORY_SEPARATOR);


//Папки компонентов
define('KYG_PATH_ADMINISTRATION', KYG_PATH_COMPONENTS . 'administration' . DIRECTORY_SEPARATOR);
define('KYG_PATH_INSTALL', KYG_PATH_COMPONENTS . 'install' . DIRECTORY_SEPARATOR);
define('KYG_PATH_PORTAL', KYG_PATH_COMPONENTS . 'portal' . DIRECTORY_SEPARATOR);

//Прочие папки
define('SMARTY_DIR', KYG_PATH_EXTERNAL . 'smarty' . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR);

//Прочие константы
define('KYG_FRAMEWORK_VERSION', '1.0.0');
define('KYG_LANGUAGE_DEFAULT', 'ru-RU');
define('KYG_PROTECTION', bin2hex(random_bytes(64)));