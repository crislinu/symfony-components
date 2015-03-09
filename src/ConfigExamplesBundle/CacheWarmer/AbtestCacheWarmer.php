<?php
namespace ConfigExamplesBundle\CacheWarmer;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;

class AbtestCacheWarmer implements CacheWarmerInterface
{
    private $loader;
    private $cachePath;

    function __construct(FileLoader $loader, $cachePath) {
        $this->loader = $loader;
        $this->cachePath = $cachePath;
    }

    public function isOptional()
    {
        return true;
    }

    public function warmUp($cacheDir)
    {

    }

}
