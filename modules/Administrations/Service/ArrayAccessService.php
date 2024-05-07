<?php
/********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2025 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 ********************************************************************************/
namespace App\Modules\Administrations\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Contracts\Translation\TranslatorInterface;

class ArrayAccessService
{
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
    public function __construct(
        private ContainerBagInterface $params,
        private TranslatorInterface $translator
    ) {
        $DateTime = new \DateTimeImmutable('2024-09-01 01:05:05');
        foreach ($this->DataFormat as $key => $Value) {
            $this->DataFormat[$key]['example'] = $DateTime->format($Value['format']);
        }
        foreach ($this->TimeFormat as $key => $Value) {
            $this->TimeFormat[$key]['example'] = $DateTime->format($Value['format']);
        }
    }
    public function getTimeZone()
    {
        return timezone_identifiers_list();
    }
    public function getLanguages(string $Language): array
    {
        $languages = Yaml::parseFile($this->params->get('app.modules_dir') . '/languages.yaml');
        foreach ($languages['languages'] as $key => $Value) {
            $languages['languages'][$key]['translation'] = $this->translator->trans('languages.' . $key, domain: 'languages', locale: $Language);
        }
        return $languages['languages'];
    }
    public function getExtensions(): array {
        $extensions = Yaml::parseFile($this->params->get('app.modules_dir') . '/extensions.yaml');
        return $extensions['extensions'];
    }
}