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
use KYG\templates;

$LanguageSystem = $_POST['LanguageSetup'];

$NameHost = $_COOKIE['NameHost'];
$UrlHTML = $_COOKIE['UrlHTML'];

setrawcookie('LanguageSystem', $LanguageSystem, 0, '/', $NameHost);

$DefinesDir = $_COOKIE['DefinesDir'];
require_once($DefinesDir . 'defines.php');

require(KYG_PATH_EXTERNAL . 'autoload.php');

$TemplatsHTML = new \KYG\templates\TemplateHTML($LanguageSystem, $UrlHTML, $NameHost);



/*if (version_compare(PHP_VERSION, KYG_MINIMUM_PHP, '<')) {
	echo $HTMLInstallClass->HTMLPrintErrorPHP($UrlHost);
	exit;
}
if (session_status() == PHP_SESSION_DISABLED) {
	echo $HTMLInstallClass->HTMLPrintErrorSession($UrlHost);
	exit;
}	
if (session_status() == PHP_SESSION_ACTIVE) {
	echo $HTMLInstallClass->HTMLPrintErrorSessionAuto($UrlHost);
	exit;
}
if (!(extension_loaded('mysqli') or extension_loaded('pdo_mysql'))) {
	echo $HTMLInstallClass->HTMLPrintErrorSQL($UrlHost);
	exit;
}*/



$TemplatsHTML->display('step2.tpl');
