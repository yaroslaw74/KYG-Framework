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

if (!file_exists(KYG_PATH_BASE . 'external')) 
	if (!file_exists(KYG_PATH_BASE . 'composer')) {
		$argv = array('--install-dir=' . KYG_PATH_BASE, '--disable-tls', '--filename=composer');
		require(KYG_PATH_INCLUDES . 'composer-setup.php');
	}
	
setrawcookie('DefinesDir', KYG_PATH_INCLUDES, 0, '/', $NameHost);
setrawcookie('NameHost', $NameHost, 0, '/', $NameHost);
setrawcookie('FullNameHost', $FullNameHost, 0, '/', $NameHost);
setrawcookie('UrlHTML', $UrlHTML, 0, '/', $NameHost);

require(KYG_PATH_EXTERNAL . 'autoload.php');

$TemplatsHTML = new \KYG\templates\TemplateHTML(KYG_LANGUAGE_DEFAULT, $UrlHTML, $NameHost);

$TemplatsHTML->display('step1.tpl');