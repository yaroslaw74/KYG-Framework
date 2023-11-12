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
use KYG\ini;

ignore_user_abort();

$AdminLogin = $_POST['AdminLogin'];
$AdminEmail = $_POST['AdminEmail'];
$AdminPassword = $_POST['AdminPassword'];

$NameHost = $_COOKIE['NameHost'];
$UrlHTML = $_COOKIE['UrlHTML'];
$LanguageSystem = $_COOKIE['LanguageSystem'];

$DefinesDir = $_COOKIE['DefinesDir'];
require_once($DefinesDir . 'defines.php');

require(KYG_PATH_EXTERNAL . 'autoload.php');

$TemplatsHTML = new \KYG\templates\TemplateHTML($LanguageSystem, $UrlHTML, $NameHost);

$TemplatsHTML->display('step5.tpl');

$IniFile = new \KYG\ini\IniFileWork;

$IniFile->Config['Host']['NameHost'] = $NameHost;
$IniFile->Config['Host']['FullNameHost'] = $_COOKIE['FullNameHost'];
$IniFile->Config['MySQL']['HostSQL'] = $_COOKIE['HostDB'];
$IniFile->Config['MySQL']['PortSQL'] = $_COOKIE['PortDB'];
$IniFile->Config['MySQL']['NameSQL'] = $_COOKIE['NameDB'];
$IniFile->Config['MySQL']['UserSQL'] = $_COOKIE['UserDB'];
$IniFile->Config['MySQL']['PasswordSQL'] = $_COOKIE['PasswordDB'];
$IniFile->Config['Setup']['TimeZoneSystem'] = $_COOKIE['TimeZoneSystem'];
$IniFile->Config['Setup']['DataFormatSystem'] = $_COOKIE['DataFormatSystem'];
$IniFile->Config['Setup']['TimeFormatSystem'] = $_COOKIE['TimeFormatSystem'];
$IniFile->Config['Setup']['LanguageSystem'] = $LanguageSystem;
$IniFile->Config['Secret']['Protection'] = KYG_PROTECTION;

$IniFile->WriteConfigIniFile('congig_framevork');
