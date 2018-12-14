<?php

namespace Megagroup\MegaCrm\Api\Response\Type\Client;

use Megagroup\MegaCrm\Api\Type\Boolean;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method string getName()
 * @method int getPosition()
 * @method bool getDeletable()
 *
 * @method Category setId(int $id)
 * @method Category setName(string $name)
 * @method Category setPosition(int $position)
 * @method Category setDeletable(bool $deletable)
 */
class Category extends StructAbstract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var bool
     */
    protected $deletable;

    protected function getProperties()
    {
        return [
            'id' => new Integer,
            'name' => new Generic,
            'position' => new Integer,
            'deletable' => new Boolean,
        ];
    }

}
