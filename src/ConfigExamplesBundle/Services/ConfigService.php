<?php
namespace ConfigExamplesBundle\Services;

use Symfony\Component\Config\Loader\LoaderInterface;

// fiecare loader sa incarce un global.yml din dir root al lui.
class ConfigService
{
    private $loader;
    private $resourcesToLoad = array();

    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    public function loadConfiguration($uri, $type = null)
    {
        $config = array();
        $this->addResourcesToLoad($uri, $type);
        // the last resource to load is the current resource
        $this->resourcesToLoad = array_reverse($this->resourcesToLoad);
        foreach ($this->resourcesToLoad as $key => $value) {
            if (is_string($key)) {
                $currentConfig = $this->loader->load($value, $key);
            } else {
                $currentConfig = $this->loader->load($value);
            }
            
            $config = array_replace_recursive($config, $currentConfig);
        }

        return $config;
    }

    public function addResourcesToLoad($uri, $type = null)
    {
        if ($type) {
            $this->resourcesToLoad[$type] = $uri;
        } else {
            $this->resourcesToLoad[] = $uri;
        }
    }

}