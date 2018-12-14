<?php

namespace Megagroup\MegaCrm\Api\Response\Type;

use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method string getDisplayValue()
 * @method string getValue()
 *
 * @method CustomFieldValue setDisplayValue(string $display_value)
 * @method CustomFieldValue setValue(string $value)
 */
class CustomFieldValue extends StructAbstract
{

    /**
     * @var string
     */
    protected $display_value;

    /**
     * @var string
     */
    protected $value;

    protected function getProperties()
    {
        return [
            'display_value' => new Generic,
            'value' => new Generic,
        ];
    }

}
