<?php

namespace Megagroup\MegaCrm\Api\Type;

class Generic implements TypeInterface
{

    public function cast($value)
    {
        if (!is_scalar($value)) {
            throw new Exception\TypeException('Value must be scalar');
        }

        return (string)$value;
    }

}
