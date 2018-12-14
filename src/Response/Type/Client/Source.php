<?php

namespace Megagroup\MegaCrm\Api\Response\Type\Client;

use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method string getName()
 *
 * @method Source setId(int $id)
 * @method Source setName(string $name)
 */
class Source extends StructAbstract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    protected function getProperties()
    {
        return [
            'id' => new Integer,
            'name' => new Generic,
        ];
    }

}
