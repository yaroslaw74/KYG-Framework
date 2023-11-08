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
use KYG\templates;

if (!file_exists(KYG_PATH_BASE . 'external')) 
	if (!file_exists(KYG_PATH_BASE . 'composer')) {
		$argv = array('--install-dir=' . KYG_PATH_BASE, '--disable-tls', '--filename=composer');
		require(KYG_PATH_INCLUDES . 'composer-setup.php');
	}
	
setrawcookie('DefinesDir', KYG_PATH_INCLUDES, 0, '/', $NameHost);
setrawcookie('NameHost', $NameHost, 0, '/', $NameHost);
setrawcookie('UrlHTML', $UrlHTML, 0, '/', $NameHost);

require(KYG_PATH_EXTERNAL . 'autoload.php');

$TemplatsHTML = new \KYG\templates\TemplateHTML(KYG_LANGUAGE_DEFAULT, $UrlHTML, $NameHost);

$TemplatsHTML->display('step1.tpl');