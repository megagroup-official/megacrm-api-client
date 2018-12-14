<?php

namespace Megagroup\MegaCrm\Api\Type;

class ClassOf implements StructuredInterface
{

    /**
     * @var string
     */
    private $class_name;

    /**
     * @param string $class_name The referenced class must be an instance of
     *                           StructAbstract
     */
    public function __construct($class_name)
    {
        $this->class_name = $class_name;
    }

    public function cast($value)
    {
        if ($value instanceof $this->class_name) {
            return $value;
        }

        throw new Exception\TypeException(
            'Value must be instance of ' . get_class($this)
        );
    }

    public function fromArray(array $value)
    {
        /** @var StructAbstract $class */
        $class = new $this->class_name;

        return $class->fromArray($value);
    }

    /**
     * @param StructAbstract $value
     *
     * @return mixed
     */
    public function toArray($value)
    {
        return $value->toArray();
    }

}
