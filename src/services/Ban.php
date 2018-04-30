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
use njpanderson\citrus\services\ElementURLs as ElementURLsService;
use njpanderson\citrus\jobs\Purge as PurgeJob;

use Craft;
use craft\base\Component;
use craft\base\Element;

/**
 * Ban Service
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
class Ban extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Citrus::$plugin->ban->banByElement()
     *
     * @return mixed
     */
    public function banByElement(Element $element)
    {
        $urls[] = Citrus::$plugin->elementurls->get($event->element);

        $queue = Craft::$app->getQueue();
        $jobId = $queue->push(new BanJob([
            'description' => Craft::t('citrus', 'This overrides the default description'),
            'someAttribute' => 'someValue',
        ]));
    }
}
