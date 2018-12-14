<?php

namespace Megagroup\MegaCrm\Api\Response\Type;

use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method string getCode()
 * @method int getNum()
 * @method string getName()
 * @method string getShortName()
 *
 * @method Currency setId(int $id)
 * @method Currency setCode(string $code)
 * @method Currency setNum(int $num)
 * @method Currency setName(string $name)
 * @method Currency setShortName(string $short_name)
 */
class Currency extends StructAbstract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var int
     */
    protected $num;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $short_name;

    protected function getProperties()
    {
        return [
            'id' => new Integer,
            'code' => new Generic,
            'num' => new Integer,
            'name' => new Generic,
            'short_name' => new Generic,
        ];
    }

}
