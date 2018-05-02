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
use craft\elements\Entry;

/**
 * EntryUrls Service
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
class EntryUrls extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Citrus::$plugin->entryurls->exampleService()
     *
     * @return mixed
     */
    public function get(Entry $entry)
    {
        $urls = [];
        $urls = array_merge($urls, [$this->collectEntryUrl($entry)]);
        $urls = array_merge($urls, $this->collectRelationalUrls($entry));

        return $urls;
    }

    private function collectEntryUrl(Entry $entry) {
        $url = new URL;
        $url->setEntry($entry);

        return $url;
    }

    private function collectRelationalUrls(Entry $entry) {
        $entries = Entry::find()
            ->relatedTo($entry);

        foreach ($entries as $related) {
            \var_dump($related->slug);
        }

        return [];
    }
}
