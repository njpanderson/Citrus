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
 * Ban Command
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
 * ./craft citrus/ban
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft citrus/ban/do-something
 *
 * @author    Neil Anderson
 * @package   Citrus
 * @since     1.0.0
 */
class BanController extends Controller
{
    // Public Methods
    // =========================================================================

    /**
     * Handle citrus/ban console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'something';

        echo "Welcome to the console BanController actionIndex() method\n";

        return $result;
    }

    /**
     * Handle citrus/ban/test console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
    public function actionTest()
    {
        $result = 'something';

        echo "Welcome to the console BanController test() method\n";

        return $result;
    }
}
