<?php
/********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 * @Data       23.02.2024
 *
 * @Copyright  (C) 2025 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 ********************************************************************************/
namespace KYG\Modules\Administrations\Resource;

use Symfony\Component\Translation\Translator;

class ArrayAccess
{
    private $Themes = [
        'base' => ['key' => 'themes.base'],
        'black-tie' => ['key' => 'themes.black-tie'],
        'blitzer' => ['key' => 'themes.blitzer'],
        'cupertino' => ['key' => 'themes.cupertino'],
        'dark-hive' => ['key' => 'themes.dark-hive'],
        'dot-luv' => ['key' => 'themes.dot-luv'],
        'eggplant' => ['key' => 'themes.eggplant'],
        'excite-bike' => ['key' => 'themes.excite-bike'],
        'flick' => ['key' => 'themes.flick'],
        'hot-sneaks' => ['key' => 'themes.hot-sneaks'],
        'humanity' => ['key' => 'themes.humanity'],
        'le-frog' => ['key' => 'themes.le-frog'],
        'mint-choc' => ['key' => 'themes.mint-choc'],
        'overcast' => ['key' => 'themes.overcast'],
        'pepper-grinder' => ['key' => 'themes.pepper-grinder'],
        'redmond' => ['key' => 'themes.redmond'],
        'smoothness' => ['key' => 'themes.smoothness'],
        'south-street' => ['key' => 'themes.south-street'],
        'start' => ['key' => 'themes.start'],
        'sunny' => ['key' => 'themes.sunny'],
        'swanky-purse' => ['key' => 'themes.swanky-purse'],
        'trontastic' => ['key' => 'themes.trontastic'],
        'ui-darkness' => ['key' => 'themes.ui-darkness'],
        'ui-lightness' => ['key' => 'themes.ui-lightness'],
        'vader' => ['key' => 'themes.vader']
    ];
    public $Effects = [
        'blind' => ['key' => 'effects.blind'],
        'bounce' => ['key' => 'effects.bounce'],
        'clip' => ['key' => 'effects.clip'],
        'drop' => ['key' => 'effects.drop'],
        'fold' => ['key' => 'effects.fold'],
        'highlight' => ['key' => 'effects.highlight'],
        'puff' => ['key' => 'effects.puff'],
        'pulsate' => ['key' => 'effects.pulsate'],
        'scale' => ['key' => 'effects.scale'],
        'shake' => ['key' => 'effects.shake'],
        'size' => ['key' => 'effects.size'],
        'slide' => ['key' => 'effects.slide'],
        'transfer' => ['key' => 'effects.transfer']
    ];
    public $TimeZone = [];
    public $DataFormat = [
        'YYYY.MM.DD' => ['format' => 'Y.m.d'],
        'YYYY-MM-DD' => ['format' => 'Y-m-d'],
        'YYYY/MM/DD' => ['format' => 'Y/m/d'],
        'yyyy.mm.dd' => ['format' => 'Y.n.j'],
        'yyyy-mm-dd' => ['format' => 'Y-n-j'],
        'yyyy/mm/dd' => ['format' => 'Y/n/j'],
        'YYYY.DD.MM' => ['format' => 'Y.d.m'],
        'YYYY-DD-MM' => ['format' => 'Y-d-m'],
        'YYYY/DD/MM' => ['format' => 'Y/d/m'],
        'yyyy.dd.mm' => ['format' => 'Y.j.n'],
        'yyyy-dd-mm' => ['format' => 'Y-j-n'],
        'YYYY/dd/mm' => ['format' => 'Y/j/n'],
        'dd.mm.yyyy' => ['format' => 'j.n.Y'],
        'dd-mm-yyyy' => ['format' => 'j-n-Y'],
        'dd/mm/yyyy' => ['format' => 'j/n/Y'],
        'DD.MM.YYYY' => ['format' => 'd.m.Y'],
        'DD-MM-YYYY' => ['format' => 'd-m-Y'],
        'DD/MM/YYYY' => ['format' => 'd/m/Y'],
        'mm.dd.yyyy' => ['format' => 'n.j.Y'],
        'mm-dd-yyyy' => ['format' => 'n-j-Y'],
        'mm/dd/yyyy' => ['format' => 'n/j/Y'],
        'MM.DD.YYYY' => ['format' => 'm.d.Y'],
        'MM-DD-YYYY' => ['format' => 'm-d-Y'],
        'MM/DD/YYYY' => ['format' => 'm/d/Y']
    ];
    public $TimeFormat = [
        'HH:MM:SS' => ['format' => 'H:i:s'],
        'HH.MM.SS' => ['format' => 'H.i.s'],
        'HH,MM,SS' => ['format' => 'H,i,s'],
        'HH:MM:SS am/pm' => ['format' => 'h:i:s a'],
        'HH.MM.SS am/pm' => ['format' => 'h.i.s a'],
        'HH,MM,SS am/pm' => ['format' => 'h,i,s a'],
        'HH:MM:SS AM/PM' => ['format' => 'h:i:s A'],
        'HH.MM.SS AM/PM' => ['format' => 'h.i.s A'],
        'HH,MM,SS AM/PM' => ['format' => 'h,i,s A'],
        'hh:mm:ss' => ['format' => 'G:i:s'],
        'hh.mm.ss' => ['format' => 'G.i.s'],
        'hh,mm,ss' => ['format' => 'G,i,s'],
        'hh:mm:ss am/pm' => ['format' => 'g:i:s a'],
        'hh.mm.ss am/pm' => ['format' => 'g.i.s a'],
        'hh,mm,ss am/pm' => ['format' => 'g,i,s a'],
        'hh:mm:ss AM/PM' => ['format' => 'g:i:s A'],
        'hh.mm.ss AM/PM' => ['format' => 'g.i.s A'],
        'hh,mm,ss AM/PM' => ['format' => 'g,i,s A']
    ];
    public $LanguageCKEditor = ['af', 'ar', 'ast', 'az', 'bg', 'bn', 'bs', 'ca', 'cs', 'da', 'de', 'de-ch', 'el', 'en-au', 'en-gb', 'eo', 'es', 'es-co', 'et', 'eu', 'fa', 'fi', 'fr', 'gl', 'gu', 'he', 'hi', 'hr', 'hu', 'hy', 'id', 'it', 'ja', 'jv', 'kk', 'km', 'kn', 'ko', 'ku', 'lt', 'lv', 'ms', 'nb', 'ne', 'nl', 'no', 'oc', 'pl', 'pt', 'pt-br', 'ro', 'ru', 'si', 'sk', 'sl', 'sq', 'sr', 'sr-latn', 'sv', 'th', 'tk', 'tr', 'tt', 'ug', 'uk', 'ur', 'uz', 'vi', 'zh', 'zh-cn'];
    public $LanguageData = ['af', 'ar', 'ar-DZ', 'az', 'be', 'bg', 'bs', 'ca', 'cs', 'cy-GB', 'da', 'de', 'de-AT', 'el', 'en-AU', 'en-GB', 'en-NZ', 'eo', 'es', 'et', 'eu', 'fa', 'fi', 'fo', 'fr', 'fr-CA', 'fr-CH', 'gl', 'he', 'hi', 'hr', 'hu', 'hy', 'id', 'is', 'it', 'it-CH', 'ja', 'ka', 'kk', 'km', 'ko', 'ky', 'lb', 'lt', 'lv', 'mk', 'ml', 'ms', 'nb', 'nl', 'nl-BE', 'nn', 'no', 'pl', 'pt', 'pt-BR', 'rm', 'ro', 'ru', 'sk', 'sl', 'sq', 'sr', 'sr-SR', 'sv', 'ta', 'ta', 'tj', 'tr', 'uk', 'vi', 'zh-CN', 'zh-HK', 'zh-TW'];
    public function __construct()
    {
        $this->TimeZone = timezone_identifiers_list();
        $DateTime = new \DateTimeImmutable('2024-09-01 01:05:05');
        foreach ($this->DataFormat as $key => $Value) {
            $this->DataFormat[$key]['example'] = $DateTime->format($Value['format']);
        }
        foreach ($this->TimeFormat as $key => $Value) {
            $this->TimeFormat[$key]['example'] = $DateTime->format($Value['format']);
        }

    }
    public function detThemes(string $Language): array
    {
        $translator = new Translator($Language);
        foreach ($this->Themes as $key => $Value) {
            $this->Themes[$key]['text'] = $translator->trans($Value['key'], [], 'interface', locale: $Language);
        }
        return $this->Themes;
    }
    public function detEffects(string $Language): array
    {
        $translator = new Translator($Language);
        foreach ($this->Effects as $key => $Value) {
            $this->Effects[$key]['text'] = $translator->trans($Value['key'], [], 'interface', locale: $Language);
        }
        return $this->Effects;
    }
}