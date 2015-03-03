<?php
namespace ConfigExamplesBundle\Locator;

use Symfony\Component\Config\FileLocatorInterface;

class AbtestLocator implements FileLocatorInterface
{
    const TEST_FILE_NAME = 'config.yml';

    private $locator;
    private $basePath;

    function __construct($basePath, FileLocatorInterface $fileLocator)
    {
        $this->basePath = $basePath;
        $this->locator = $fileLocator;
    }

    public function locate($name, $currentPath = null, $first = true)
    {
        // explode $name after '.' & make the current path
        $exploded = explode('.', strtolower($name));
        $configPath = implode(DIRECTORY_SEPARATOR, $exploded);
        $currentPath = $this->basePath . DIRECTORY_SEPARATOR . $configPath;

        return  $this->locator->locate(self::TEST_FILE_NAME, $currentPath, $first);
    }
}
