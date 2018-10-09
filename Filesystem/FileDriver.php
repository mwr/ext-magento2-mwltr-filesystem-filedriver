<?php
declare(strict_types=1);
/**
 * @copyright see LICENSE
 */

namespace Mwltr\FilesystemFileDriver\Filesystem;

use Magento\Framework\Filesystem\Driver\File;
use Mwltr\FilesystemFileDriver\Helper\RelativePathHelper;

class FileDriver extends File
{
    /**
     * @var \Mwltr\FilesystemFileDriver\Helper\RelativePathHelper
     */
    private $relativePathHelper;

    /**
     * FileDriver constructor.
     *
     * @param \Mwltr\FilesystemFileDriver\Helper\RelativePathHelper $relativePathHelper
     */
    public function __construct(RelativePathHelper $relativePathHelper = null)
    {
        if ($relativePathHelper === null) {
            $relativePathHelper = new RelativePathHelper();
        }

        $this->relativePathHelper = $relativePathHelper;
    }

    public function getRelativePath($basePath, $path = null)
    {
        // there are some occasions where magento uses this method with $path being a sub-path to $basePath
        // The releative path calculation only works with two absolute path.
        // This is basically a fallback to the stanard magento2 behaviour
        if (strpos($path, '/') !== 0) {
            return $path;
        }

        return $this->relativePathHelper->getRelativePath($basePath, $path);
    }

}
