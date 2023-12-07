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

$TimeZoneSystem = $_POST['TimeZoneSystem'];
$DataFormatSystem = $_POST['DataFormatSystem'];
$TimeFormatSystem = $_POST['TimeFormatSystem'];

$NameHost = $_COOKIE['NameHost'];
$UrlHTML = $_COOKIE['UrlHTML'];
$LanguageSystem = $_COOKIE['LanguageSystem'];

setrawcookie('TimeZoneSystem', $TimeZoneSystem, 0, '/', $NameHost);
setrawcookie('DataFormatSystem', $DataFormatSystem, 0, '/', $NameHost);
setrawcookie('TimeFormatSystem', $TimeFormatSystem, 0, '/', $NameHost);

$DefinesDir = $_COOKIE['DefinesDir'];
require_once($DefinesDir . 'defines.php');

require(KYG_PATH_EXTERNAL . 'autoload.php');

$TemplatsHTML = new \KYG\templates\TemplateHTML($LanguageSystem, $UrlHTML, $NameHost);

$TemplatsHTML->display('step4.tpl');