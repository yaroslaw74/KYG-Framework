<?php
/********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2025 Kataev Yaroslav Georgievich 
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE.md
 ********************************************************************************/
namespace App\Twig;

use App\Modules\Administrations\Service\ArrayAccessService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppTwigExtension extends AbstractExtension
{
    public function __construct(private ArrayAccessService $ArrayAccess)
    {
    }
    public function LocaleDirExtension(string $locale): string
    {
        $languages = $this->ArrayAccess->getLanguages($locale);
        return $languages[$locale]['dir'];
    }
    public function InArrayExtension(mixed $needle, array $haystack): bool
    {
        return in_array($needle, $haystack);
    }
    public function getFunctions(): array
    {
        return [
            new TwigFunction('localedir', [$this, 'LocaleDirExtension']),
            new TwigFunction('in_array', [$this, 'InArrayExtension']),
        ];
    }
}