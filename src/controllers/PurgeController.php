<?php
/**
 * Citrus plugin for Craft CMS 3.x
 *
 * Automatically purge and ban elements in Varnish.
 *
 * @link      https://github.com/njpanderson/Citrus
 * @copyright Copyright (c) 2018 Neil Anderson
 */

namespace njpanderson\citrus\controllers;

use njpanderson\citrus\Citrus;

use Craft;
use craft\web\Controller;

/**
 * Purge Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Neil Anderson
 * @package   Citrus
 * @since     0.1.0
 */
class PurgeController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'test'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/citrus/purge
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the PurgeController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionTest URL,
     * e.g.: actions/citrus/purge/test
     *
     * @return mixed
     */
    public function actionTest()
    {
        $result = 'Welcome to the PurgeController actionTest() method';

        return $result;
    }
}
