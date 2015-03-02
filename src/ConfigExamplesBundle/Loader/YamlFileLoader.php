<?php
namespace ConfigExamplesBundle\Loader;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Config\Loader\FileLoader;

class YamlFileLoader extends FileLoader
{
    /**
     * Loads a resource.
     *
     * @param string $resource The file
     * @param string $type     The resource type
     * @return array SiteConfig
     */
    public function load($resource, $type = null)
    {

        $filePath = $this->locator->locate($resource);

        $content = Yaml::parse($filePath);

        // empty file
        if (null === $content) {
            return;
        }

        // imports
        $content = $this->parseImports($content, $filePath);

        return $content;
    }

    /**
     * Returns true if this class supports the given resource.
     *
     * @param mixed  $resource A resource
     * @param string $type     The resource type
     *
     * @return Boolean true if this class supports the given resource, false otherwise
     */
    public function supports($resource, $type = null)
    {
        return is_string($resource) && $type == null && 'yml' === pathinfo(
            $resource,
            PATHINFO_EXTENSION
        );
    }

    /**
     * Parse the resource to import
     *
     * @param array $content
     * @param string $file
     * @return boolean
     */
    private function parseImports($content, $file)
    {
        /*
         *
         * imports:
         *   -	{ resource: “fr/meetic/www/config.yml” }
         *
         */
        if (isset($content['imports'])) {
            foreach ($content['imports'] as $import) {
                $contentImported = $this->import($import['resource'], null, false, $file);
                if (!is_array($contentImported) || empty($contentImported)) {
                    continue;
                }
                $content = array_replace_recursive($contentImported, $content);
            }

            unset($content['imports']);
        }

        /*
         * global:
         *   adtags: 1
         *   dailymatches: { resource: "%site_config.models_root_dir%/dailymatches/model1.yml" }
         */
        $that = $this; // in PHP 5.4.0 $this can be used in anonymous functions :(
        $funcSearchResource = function (&$arrContent) use (&$that, $file, &$funcSearchResource) {
            foreach ($arrContent as $key => $value) {
                if (is_array($value)) {
                    if (isset($value['resource'])) {
                        $that->setCurrentDir(dirname($file));
                        $arrContent[$key] = $that->import($value['resource'], null, false, $file);
                    } else {
                        $funcSearchResource($arrContent[$key]);
                    }
                }
            }
        };
        $funcSearchResource($content);

        return $content;
    }
}
