<?php
namespace ConfigExamplesBundle\Loader;

class AbtestFileLoader extends YamlFileLoader
{
    /**
     *
     * @param type $resource
     * @param type $type
     * @return type
     */
    public function supports($resource, $type = null)
    {
        // If we want o load same filename from within different location
        // we have to avoid using 'yml' === pathinfo($resource, PATHINFO_EXTENSION)
        return is_string($resource) && $type == 'abtest';
    }
}