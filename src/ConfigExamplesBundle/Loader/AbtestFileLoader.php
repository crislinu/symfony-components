<?php
namespace ConfigExamplesBundle\Loader;

class AbtestFileLoader extends YamlFileLoader
{
    public function supports($resource, $type = null) {
         return is_string($resource) && 'yml' === pathinfo(
            $resource,
            PATHINFO_EXTENSION
        ) && $type == 'abtest';
    }


}
