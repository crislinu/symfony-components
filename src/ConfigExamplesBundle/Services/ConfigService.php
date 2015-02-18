<?php
namespace ConfigExamplesBundle\Sevices;

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
        $this->addResourcesToLoade($uri, $type);
        foreach ($this->resourcesToLoad as $value) {
            $config = $this->loader->load($value['file']);
        }

        return $config;
    }

    public function addResourcesToLoade($uri, $type = null)
    {
        $this->resourcesToLoad[]['file'] = $uri;
        if ($type) {
            $this->resourcesToLoad[]['type'] = $type;
        }
    }

}