# Mwltr_FilesystemFileDriver Magento2 module

This module replaces the class 
``\Magento\Framework\Filesystem\Driver\File`` to provide a correct implementation 
for the getRelativePath method.

## Prerequisites

You only need this module if you plan on having magento module sources outside of the Magento root.

## Implementation
The overwrite can be found in ``\Mwltr\FilesystemFileDriver\Filesystem\FileDriver``.

The actual implementation of the relative path caclulation can be found in 
``\Mwltr\FilesystemFileDriver\Helper\RelativePathHelper``.

To exchange the ``\Magento\Framework\Filesystem\Driver\File`` an di.xml defintion won't work, 
since the DriverPool is defined in ``\Magento\Framework\App\Bootstrap::createFilesystemDriverPool``.

There is a way to add additional parameters to the DriverPool, by setting an array field with key 
``Magento\Framework\App\Bootstrap::INIT_PARAM_FILESYSTEM_DRIVERS`` in the ``$_SERVER``.

This module does that in the registration.php, 
since the registration.php is included during the whole composer autoload inclusion. 

``` php
$_SERVER[\Magento\Framework\App\Bootstrap::INIT_PARAM_FILESYSTEM_DRIVERS] = [
    'file' => \Mwltr\FilesystemFileDriver\Filesystem\FileDriver::class,
];
```