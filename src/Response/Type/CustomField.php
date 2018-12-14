<?php

namespace Megagroup\MegaCrm\Api\Response\Type;

use Megagroup\MegaCrm\Api\Type\ClassOf;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\ListOf;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method CustomFieldValue[] getValues()
 *
 * @method CustomField setId(int $id)
 * @method CustomField setValues(CustomFieldValue[] $values)
 */
class CustomField extends StructAbstract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @var CustomFieldValue[]
     */
    protected $values;

    protected function getProperties()
    {
        return [
            'id' => new Integer,
            'alias' => new Generic,
            'values' => new ListOf(new ClassOf(CustomFieldValue::class)),
        ];
    }

}
