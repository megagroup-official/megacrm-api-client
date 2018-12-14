<?php

namespace Megagroup\MegaCrm\Api\Response\Type\Deal;

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
 * @method RejectReason setId(int $id)
 * @method RejectReason setName(string $name)
 * @method RejectReason setPosition(int $position)
 * @method RejectReason setDeletable(bool $deletable)
 */
class RejectReason extends StructAbstract
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
