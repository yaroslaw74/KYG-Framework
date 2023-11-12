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
declare(strict_types = 1);

namespace KYG\ini;

class IniFileWork {
	public $Config = array(
		'Host' => array(
			'NameHost' => null,
			'FullNameHost' => null
			),
		'MySQL' => array(
			'HostSQL' => null,
			'PortSQL' => null,
			'NameSQL' => null,
			'UserSQL' => null,
			'PasswordSQL' => null
		),
		'Setup' => array(
			'TimeZoneSystem' => null,
			'DataFormatSystem' => null,
			'TimeFormatSystem' => null,
			'LanguageSystem' => null
		),
		'Secret' => array(
			'Protection' => null
		)
	);
	
	protected function ContentsIniFileGet($FileName) {
		$KayIniFile = parse_ini_file($FileName);
		return($KayIniFile);
	}
	
	protected function ContentsFullIniFileGet($FileName) {
		$KayIniFile = parse_ini_file($FileName, true);
		return($KayIniFile);
	}
	
	public function StructureConfigIniGet($FileName) {
		$StructureFile = $this->ContentsFullIniFileGet(\KYG_PATH_CONFIG . $FileName . '.ini');
		return 	$StructureFile;
	}
	
	public function ConfigIniGet($FileName){
		$IniFile = $this->ContentsIniFileGet(\KYG_PATH_CONFIG . $FileName . '.ini');
		return 	$IniFile;
	}
	
	protected function HatIniFile() {
		$Star = ";";
		for ($i = 1; $i <= 88; $i++) $Star .= "*";
		$Hat = $Star . "\n";
		$Hat .= ";* @Project    KYG Framework\n";
		$Hat .= ";* @Version    " . \KYG_FRAMEWORK_VERSION . "\n";
		$Hat .= ";* @Data       " . date("m.d.Y") . " г.\n";
		$Hat .= ";*\n";
		$Hat .= ";* @Copyright  (C) 2024 Kataev Yaroslav Georgievich\n";
		$Hat .= ";* @E-mail     yaroslaw74@gmail.com\n";
		$Hat .= ";* @License    GNU General Public License version 3 or later; see LICENSE.txt;\n";
		$Hat .= $Star . "\n\n";
		return($Hat);
	}
	
	public function WriteConfigIniFile($FileName, $Content=null) {
		if ($Content==null) $Content = $this->Config;
		$iniContent = $this->HatIniFile();
		foreach ($Content as $section => $data) {
  			$iniContent .= "[" . $section . "]\n";
			foreach ($data as $kay => $value) {
				$iniContent .= $kay . " = \"" . $value . "\"\n";
			}
			$iniContent .= "\n";
		}
		file_put_contents(\KYG_PATH_CONFIG . $FileName . '.ini', $iniContent, LOCK_EX);
	}
}