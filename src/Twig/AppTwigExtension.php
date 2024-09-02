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

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Yaml\Yaml;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppTwigExtension extends AbstractExtension
{
    public function __construct(private ContainerBagInterface $params) {}
    public function LocaleDirExtension(string $locale): string
    {
        $languages = Yaml::parseFile($this->params->get('app.modules_dir') . '/Install/Resources/languages.yaml');
        return $languages['languages'][$locale]['dir'];
    }
    
    public function getFunctions(): array
    {
        return [
            new TwigFunction('localedir', [$this, 'LocaleDirExtension'])
        ];
    }
}