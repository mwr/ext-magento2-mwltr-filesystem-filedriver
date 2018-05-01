<?php

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Mwltr_FilesystemFileDriver',
    __DIR__
);

// Register the custom Filesystem FileDriver that calculates correct relative paths
$_SERVER[\Magento\Framework\App\Bootstrap::INIT_PARAM_FILESYSTEM_DRIVERS] = [
    'file' => \Mwltr\FilesystemFileDriver\Filesystem\FileDriver::class,
];