<?php

namespace Megagroup\MegaCrm\Api\Response\Type\Deal;

use Megagroup\MegaCrm\Api\Type\Boolean;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method int getUiId()
 * @method int getCategoryId()
 * @method string getName()
 * @method int getPosition()
 * @method string getBgColor()
 * @method bool getDeletable()
 *
 * @method Status setId(int $id)
 * @method Status setUiId(int $ui_id)
 * @method Status setCategoryId(int $category_id)
 * @method Status setName(string $name)
 * @method Status setPosition(int $position)
 * @method Status setBgColor(string $bg_color)
 * @method Status setDeletable(bool $deletable)
 */
class Status extends StructAbstract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $category_id;

    /**
     * @var int
     */
    protected $ui_id;

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
    protected $deletable;

    protected function getProperties()
    {
        return [
            'id' => new Integer,
            'ui_id' => new Integer,
            'category_id' => new Integer,
            'name' => new Generic,
            'position' => new Integer,
            'bg_color' => new Generic,
            'deletable' => new Boolean,
        ];
    }

}
