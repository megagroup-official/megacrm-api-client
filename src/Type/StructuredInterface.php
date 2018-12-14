<?php

namespace Megagroup\MegaCrm\Api\Type;

interface StructuredInterface extends TypeInterface
{

    public function fromArray(array $value);

    public function toArray($value);

}
