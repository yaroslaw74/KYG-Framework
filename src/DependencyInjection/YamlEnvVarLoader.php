<?php
/**********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2026 Kataev Yaroslav Georgievich
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE.md
 *********************************************************************************/
namespace App\DependencyInjection;

use Symfony\Component\DependencyInjection\EnvVarLoaderInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

final class YamlEnvVarLoader implements EnvVarLoaderInterface
 {
    public function __construct(private ContainerBagInterface $params) {}

    public function loadEnvVars(): array
 {
        $fileName = $this->params->get('app.public_dir') . '/env.yaml';
        $filesystem = new Filesystem();
        if (!$filesystem->exists($fileName)) {
            return [];
        } else {
            $content = Yaml::parseFile($fileName);
            return $content['vars'];
        }
    }
}