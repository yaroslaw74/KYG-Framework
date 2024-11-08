<?php
/**********************************************************************************
 * @Project    KYG Framework for business
 * @Version    1.0.0
 *
 * @Copyright  (C) 2026 Kataev Yaroslav Georgievich
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE.md
 *********************************************************************************/
namespace App\EventSubscriber;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Yaml\Yaml;

class TimeZoneSubscriber implements EventSubscriberInterface
{
    public function __construct(public ContainerBagInterface $params)
    {
    }
    public function onKernelController(ControllerEvent $event): void
    {
        $file = Yaml::parseFile($this->params->get('kernel.project_dir') . '/public/config/twig.yaml');
        $TimeZone = $file['twig']['date']['timezone'];
        if ((!is_null($TimeZone)) and ($TimeZone != date_default_timezone_get())) {
            date_default_timezone_set($TimeZone);
        }
    }
    public static function getSubscribedEvents(): array
    {
        return [KernelEvents::CONTROLLER => 'onKernelController'];
    }
}