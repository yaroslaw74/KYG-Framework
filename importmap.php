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
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@hotwired/turbo' => [
        'version' => '8.0.20',
    ],
    'es-module-shims' => [
        'version' => '2.6.2',
    ],
    'bootstrap-icons/font/bootstrap-icons.min.css' => [
        'version' => '1.13.1',
        'type' => 'css',
    ],
    'boxicons/css/boxicons.min.css' => [
        'version' => '2.1.4',
        'type' => 'css',
    ],
    '@fortawesome/fontawesome-free/css/all.min.css' => [
        'version' => '7.1.0',
        'type' => 'css',
    ],
    'ionicons/dist/css/ionicons.min.css' => [
        'version' => '4.6.4-1',
        'type' => 'css',
    ],
    'line-awesome/dist/line-awesome/css/line-awesome.min.css' => [
        'version' => '1.3.0',
        'type' => 'css',
    ],
    'material-icons/iconfont/material-icons.css' => [
        'version' => '1.13.14',
        'type' => 'css',
    ],
    'material-symbols/index.css' => [
        'version' => '0.40.0',
        'type' => 'css',
    ],
    '@mdi/font/css/materialdesignicons.min.css' => [
        'version' => '7.4.47',
        'type' => 'css',
    ],
    'remixicon/fonts/remixicon.css' => [
        'version' => '4.7.0',
        'type' => 'css',
    ],
    'simple-line-icons/css/simple-line-icons.css' => [
        'version' => '2.5.5',
        'type' => 'css',
    ],
    '@tabler/icons-webfont/dist/tabler-icons.min.css' => [
        'version' => '3.35.0',
        'type' => 'css',
    ],
    'cd-themify-icons/index.css' => [
        'version' => '0.0.1',
        'type' => 'css',
    ],
    'typicons.font/src/font/typicons.css' => [
        'version' => '2.1.2',
        'type' => 'css',
    ],
];
