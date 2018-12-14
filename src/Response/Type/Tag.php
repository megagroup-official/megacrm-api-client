<?php

namespace Megagroup\MegaCrm\Api\Response\Type;

use Megagroup\MegaCrm\Api\Type\Boolean;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method string getName()
 * @method int getPosition()
 * @method string getBgColor()
 * @method bool getDeleted()
 *
 * @method Tag setId(int $id)
 * @method Tag setName(string $name)
 * @method Tag setPosition(int $position)
 * @method Tag setBgColor(string $bg_color)
 * @method Tag setDeleted(bool $deleted)
 */
class Tag extends StructAbstract
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
     * @var string
     */
    protected $bg_color;

    /**
     * @var bool
     */
    protected $deleted;

    protected function getProperties()
    {
        return [
            'id' => new Integer,
            'name' => new Generic,
            'position' => new Integer,
            'bg_color' => new Generic,
            'deleted' => new Boolean,
        ];
    }

}
