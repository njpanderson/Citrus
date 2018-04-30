<?php
/**
 * Citrus plugin for Craft CMS 3.x
 *
 * Automatically purge and ban elements in Varnish.
 *
 * @link      https://github.com/njpanderson/Citrus
 * @copyright Copyright (c) 2018 Neil Anderson
 */

namespace njpanderson\citrus\models;

use njpanderson\citrus\Citrus;

use Craft;
use craft\base\Model;
use craft\helpers\UrlHelper;
use yii\validators\IpValidator;

/**
 * Citrus Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Neil Anderson
 * @package   Citrus
 * @since     0.1.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
    public $hosts = [];

    // Private Properties
    // =========================================================================

    /**
     * Class instance of IpValidator
     */
    private $ipValidator;

    // Public Methods
    // =========================================================================

    public function init() {
        $this->ipValidator = new IpValidator;
    }

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['hosts', function ($attribute, $params, $validator) {
                $rowIndex = 0;

                foreach ($this->$attribute as $host) {
                    if (empty($host['url'])) {
                        $this->addError($attribute, [
                            'row' => $rowIndex,
                            'cell' => 'url',
                            'message' => 'The host URL cannot be blank.'
                        ]);
                    }

                    if (
                        !empty($host['hostName']) &&
                        !preg_match('/^(([a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.)*([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9])$/', $host['hostName'])
                    ) {
                        $this->addError(
                            $attribute,
                            [
                                'row' => $rowIndex,
                                'cell' => 'hostName',
                                'message' => 'The host Hostname is invalid for URL "' .
                                    $host['url'] . '".'
                            ]
                        );
                    }

                    if (
                        !empty($host['adminIP']) &&
                        !$this->ipValidator->validate($host['adminIP'])
                    ) {
                        $this->addError(
                            $attribute,
                            [
                                'row' => $rowIndex,
                                'cell' => 'adminIP',
                                'message' => 'The host Admin IP is invalid for URL "' .
                                    $host['url'] . '".'
                            ]
                        );
                    }

                    if (
                        !empty($host['adminPort']) && (
                            !is_numeric($host['adminPort']) ||
                            $host['adminPort'] < 1 ||
                            $host['adminPort'] > 65535
                        )
                    ) {
                        $this->addError(
                            $attribute,
                            [
                                'row' => $rowIndex,
                                'cell' => 'adminPort',
                                'message' => 'The host Admin port is invalid for URL "' .
                                    $host['url'] . '".'
                            ]
                        );
                    }

                    $rowIndex += 1;
                }
            }],
            ['hosts', 'default', 'value' => [
                'url' => '',
                'hostName' => '',
                'adminIP' => '',
                'adminPort' => '',
                'adminSecret' => ''
            ]],
        ];
    }
}
