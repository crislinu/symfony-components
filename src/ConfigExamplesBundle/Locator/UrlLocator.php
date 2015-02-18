<?php
namespace ConfigExamplesBundle\Locator;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\FileLocatorInterface;

class UrlLocator implements FileLocatorInterface
{
    private $locator;

    function __construct(FileLocator $fileLocator) {
        $this->locator = $fileLocator;
    }

    public function locate($name, $currentPath = null, $first = true) {
        // explode $name after '.' & make other stuff
        $this->locator->locate($name, $currentPath, $first);
    }
}
