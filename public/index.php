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

require(__DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'defines.php'); 

$NameHost = $_SERVER['HTTP_HOST'];
$FullNameHost = $NameHost . $_SERVER['REQUEST_URI'];
$UrlHTTP = ((empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://'; 
$UrlHTML = $UrlHTTP . $FullNameHost;

if (!file_exists(KYG_PATH_CONFIG . 'congig_framevork.ini')) require(KYG_PATH_INSTALL . 'step1.php');









/*else {
	setrawcookie('UrlHost', $UrlHost, 0, '/', $NameHost);
	setrawcookie('Defines', KYGPATH_INCLUDES, 0, '/', $NameHost);

	//require_once(KYGPATH_INCLUDES . 'framework.php');

	require_once(KYGPATH_CLASS . 'HTMLInstallClass.php');
	$HTMLInstallClass = new HTMLInstallClass($LanguageSystem);
	echo $HTMLInstallClass->HTMLInstallEnters($UrlHost);
}*/


