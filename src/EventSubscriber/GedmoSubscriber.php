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

use Gedmo\Blameable\BlameableListener;
use Gedmo\IpTraceable\IpTraceableListener;
use Gedmo\Loggable\LoggableListener;
use Gedmo\Translatable\TranslatableListener;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

final class GedmoExtensionsEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private BlameableListener $blameableListener,
        private IpTraceableListener $ipTraceableListener,
        private LoggableListener $loggableListener,
        private TranslatableListener $translatableListener,
        private ?AuthorizationCheckerInterface $authorizationChecker = null,
        private ?TokenStorageInterface $tokenStorage = null,
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                ['configureBlameableListener'], // Must run after the user is authenticated
                ['configureIpTraceableListener', 512], // Runs early since this only requires the Request object
                ['configureLoggableListener'], // Must run after the user is authenticated
                ['configureTranslatableListener'], // Must run after the locale is configured
            ],
        ];
    }

    /**
     * Configures the blameable listener using the currently authenticated user
     */
    public function configureBlameableListener(RequestEvent $event): void
    {
        // Only applies to the main request
        if (!$event->isMainRequest()) {
            return;
        }

        // If the required security component services weren't provided, there's nothing we can do
        if (null === $this->authorizationChecker || null === $this->tokenStorage) {
            return;
        }

        $token = $this->tokenStorage->getToken();

        // Only set the user information if there is a token in storage and it represents an authenticated user
        if (null !== $token && $this->authorizationChecker->isGranted('IS_AUTHENTICATED')) {
            $this->blameableListener->setUserValue($token->getUser());
        }
    }

    /**
     * Configures the IP traceable listener using the current request
     */
    public function configureIpTraceableListener(RequestEvent $event): void
    {
        // Only applies to the main request
        if (!$event->isMainRequest()) {
            return;
        }

        $ip = $event->getRequest()->getClientIp();

        // Only set the IP address if available
        if (null !== $ip) {
            $this->ipTraceableListener->setIpValue($ip);
        }
    }

    /**
     * Configures the loggable listener using the currently authenticated user
     */
    public function configureLoggableListener(RequestEvent $event): void
    {
        // Only applies to the main request
        if (!$event->isMainRequest()) {
            return;
        }

        // If the required security component services weren't provided, there's nothing we can do
        if (null === $this->authorizationChecker || null === $this->tokenStorage) {
            return;
        }

        $token = $this->tokenStorage->getToken();

        // Only set the user information if there is a token in storage and it represents an authenticated user
        if (null !== $token && $this->authorizationChecker->isGranted('IS_AUTHENTICATED')) {
            $this->loggableListener->setUsername($token->getUser());
        }
    }

    /**
     * Configures the translatable listener using the request locale
     */
    public function configureTranslatableListener(RequestEvent $event): void
    {
        $this->translatableListener->setTranslatableLocale($event->getRequest()->getLocale());
    }
}