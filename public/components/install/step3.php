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

$HostDB = $_POST['HostDB'];
$PortDB = $_POST['PortDB'];
$NameDB = $_POST['NameDB'];
$UserDB = $_POST['UserDB'];
$PasswordDB = $_POST['PasswordDB'];

$NameHost = $_COOKIE['NameHost'];
$UrlHTML = $_COOKIE['UrlHTML'];
$LanguageSystem = $_COOKIE['LanguageSystem'];

setrawcookie('HostDB', $HostDB, 0, '/', $NameHost);
setrawcookie('PortDB', $PortDB, 0, '/', $NameHost);
setrawcookie('NameDB', $NameDB, 0, '/', $NameHost);
setrawcookie('UserDB', $UserDB, 0, '/', $NameHost);
setrawcookie('PasswordDB', $PasswordDB, 0, '/', $NameHost);

$DefinesDir = $_COOKIE['DefinesDir'];
require_once($DefinesDir . 'defines.php');

require(KYG_PATH_EXTERNAL . 'autoload.php');

$TemplatsHTML = new \KYG\templates\TemplateHTML($LanguageSystem, $UrlHTML, $NameHost);

foreach($TemplatsHTML->DataForm as $keyData => $DataValue) $Data[$keyData] = date($DataValue);
$TemplatsHTML->assign('DataForm', $Data);

foreach($TemplatsHTML->TimeForm as $keyTime => $TimeValue) $Time[$keyTime] = date($TimeValue);
$TemplatsHTML->assign('TimeForm', $Time);

$TemplatsHTML->display('step3.tpl');