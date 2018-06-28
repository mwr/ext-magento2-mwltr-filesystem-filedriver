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
        return $this->relativePathHelper->getRelativePath($basePath, $path);
    }

}
