<?php
/**
 * Scaffold plugin for Craft CMS 3.x
 *
 * Test
 *
 * @link      http://none.com
 * @copyright Copyright (c) 2018 None
 */

namespace njpanderson\citrus\models;

use njpanderson\citrus\Citrus;
use njpanderson\citrus\services\General;

use Craft;
use craft\base\Model;
use craft\elements\Entry;

/**
 * URL Model
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    None
 * @package   Citrus
 * @since     1.0.0
 */
class URL extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some model attribute
     *
     * @var string
     */
    public $element = null;
    public $fullUrl = '';
    public $host = '';

    // Public Methods
    // =========================================================================

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
            [['entry'], 'required'],
            ['fullUrl', 'string'],
            ['host', 'string']
        ];
    }

    public function setEntry(Entry $entry) {
        $this->entry = $entry;
        $this->fullUrl = $entry->getUrl();
        $this->host = General::getHostnameFromUrl($this->fullUrl);
    }
}
