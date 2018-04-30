<?php
/**
 * Citrus plugin for Craft CMS 3.x
 *
 * Automatically purge and ban elements in Varnish.
 *
 * @link      https://github.com/njpanderson/Citrus
 * @copyright Copyright (c) 2018 Neil Anderson
 */

namespace njpanderson\citrus\services;

use njpanderson\citrus\Citrus;
use njpanderson\citrus\models\URL;

use Craft;
use craft\base\Component;
use craft\base\Element;

/**
 * ElementURLs Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Neil Anderson
 * @package   Citrus
 * @since     0.1.0
 */
class ElementURLs extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Citrus::$plugin->elementurls->exampleService()
     *
     * @return mixed
     */
    public function get(Element $element)
    {
        $urls = [];
        $urls[] = $this->collectElementUrls($element);
        // $urls[] = $this->getRelationalUrls($element);

        return $urls;
    }

    private function collectElementUrls(Element $element) {
        $url = new URL;

        $url->fullURL = $this->getElementUrl($element);

        return $url;
    }

    private function collectRelationalUrls(Element $element) {

    }

    private function getElementUrl(Element $element) {
        return $element->uri;
    }
}
