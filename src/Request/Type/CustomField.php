<?php

namespace Megagroup\MegaCrm\Api\Request\Type;

use Megagroup\MegaCrm\Api\Type\EitherOf;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\ListOf;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int|string getId()
 * @method CustomField[] getValues()
 *
 * @method CustomField setId(int|string $id)
 * @method CustomField setValues(CustomField[] $values)
 */
class CustomField extends StructAbstract
{

    /**
     * @var int|string
     */
    protected $id;

    /**
     * @var CustomField[]
     */
    protected $values;

    protected function getProperties()
    {
        return [
            'id' => new EitherOf([new Integer, new Generic]),
            'values' => new ListOf(new Generic),
        ];
    }

}
