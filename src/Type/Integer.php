<?php

namespace Megagroup\MegaCrm\Api\Type;

class Integer implements TypeInterface
{

    public function cast($value)
    {
        if (!is_scalar($value)) {
            throw new Exception\TypeException('Value must be scalar');
        }

        $string = (string)$value;

        if (strlen($string) == 0) {
            throw new Exception\TypeException('Value must not be empty');
        }

        if (!ctype_digit($string)) {
            throw new Exception\TypeException('Value must contain digits only');
        }

        return (int)$value;
    }

}
