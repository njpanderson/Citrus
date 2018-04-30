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

use njpanderson\citrus\Citrus as CitrusBase;

use Craft;
use craft\base\Component;
// use craft\web\Request;
use craft\helpers\UrlHelper;

/**
 * Citrus Service
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
class Citrus extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Citrus::$plugin->bindings->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (CitrusBase::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }

    /**
     * Retrieve the 'current' hostname using the active site.
     * @return string
     */
    public static function getCurrentHostName() {
        return self::getHostnameFromUrl(
            UrlHelper::siteHost()
        );
    }

    /**
     * Convert a fully qualified URL into the hostname and return.
     * @return string
     */
    public static function getHostnameFromUrl($url) {
        $url = \parse_url($url);

        if (!empty($url['host'])) {
            return $url['host'];
        }

        return '';
    }
}
