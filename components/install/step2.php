<?php
/****************************************************************************************
 * @Проект           KYG Framework
 * @Версия           1.0
 * @Дата изменения   01.01.2024 г.
 *
 * @Авторские права  (C) 2024 Катаев Ярослав Георгиевич 
 * @E-mail           yaroslaw74@outlook.com
 * @Лицензия         GNU General Public License version 2 or later; смотри LICENSE.txt
 ***************************************************************************************/

$LanguageSystem = $_POST['LanguageSetup'];

$DefinesDir = $_COOKIE['DefinesDir'];
$NameHost = $_COOKIE['NameHost'];
$UrlHTML = $_COOKIE['UrlHTML'];

setrawcookie('LanguageSystem', $LanguageSystem, 0, '/', $NameHost);

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
