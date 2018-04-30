<?php
/**
 * Citrus plugin for Craft CMS 3.x
 *
 * Automatically purge and ban elements in Varnish.
 *
 * @link      https://github.com/njpanderson/Citrus
 * @copyright Copyright (c) 2018 Neil Anderson
 */

namespace njpanderson\citrus\console\controllers;

use njpanderson\citrus\Citrus;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Purge Command
 *
 * The first line of this class docblock is displayed as the description
 * of the Console Command in ./craft help
 *
 * Craft can be invoked via commandline console by using the `./craft` command
 * from the project root.
 *
 * Console Commands are just controllers that are invoked to handle console
 * actions. The segment routing is plugin-name/controller-name/action-name
 *
 * The actionIndex() method is what is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft citrus/purge
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft citrus/purge/do-something
 *
 * @author    Neil Anderson
 * @package   Citrus
 * @since     1.0.0
 */
class PurgeController extends Controller
{
    public $id;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function options($actionID)
    {
        $options = parent::options($actionID);

        if ($actionID === 'test') {
            $options[] = 'id';
        }

        return $options;
    }

    /**
     * Handle citrus/purge console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'something';

        echo "Welcome to the console PurgeController actionIndex() method\n";

        return $result;
    }

    /**
     * Handle citrus/purge/test console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
    public function actionTest()
    {
        if (empty($this->id)) {
            $this->stdout('Invalid id. Please define an Entry id with --id=[entry_id]' . PHP_EOL);
            return false;
        }

        $element = Craft::$app->elements->getElementById(
            (int) $this->id
        );

        $result = Citrus::$plugin->purge->purgeElement($element, true);

        return $result;
    }
}
