<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@symfony/ux-live-component' => [
        'path' => './vendor/symfony/ux-live-component/assets/dist/live_controller.js',
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.12',
    ],
    'chart.js' => [
        'version' => '4.4.6',
    ],
    'cropperjs' => [
        'version' => '1.6.2',
    ],
    'cropperjs/dist/cropper.min.css' => [
        'version' => '1.6.2',
        'type' => 'css',
    ],
    '@kurkle/color' => [
        'version' => '0.3.2',
    ],
    'tom-select' => [
        'version' => '2.3.1',
    ],
];
