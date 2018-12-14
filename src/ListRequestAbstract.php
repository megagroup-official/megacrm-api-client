<?php

namespace Megagroup\MegaCrm\Api;

use Megagroup\MegaCrm\Api\Type\ListOf;

abstract class ListRequestAbstract extends ListOf implements RequestInterface
{

    use RequestInvokeTrait;

    /**
     * @var array
     */
    private $items = [];

    public function add($value)
    {
        $this->items[] = $this->type->cast($value);

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->items;
    }

}
