<?php

namespace Megagroup\MegaCrm\Api\Type;

class EitherOf implements StructuredInterface
{

    /**
     * @var TypeInterface[]
     */
    private $types;

    /**
     * @param TypeInterface[] $types
     */
    public function __construct(array $types)
    {
        if (!$types) {
            throw new \InvalidArgumentException('Types list must not be empty');
        }

        $this->types = $types;
    }

    public function cast($value)
    {
        foreach ($this->types as $type) {
            try {
                return $type->cast($value);
            } catch (Exception\TypeException $e) {
                continue;
            }
        }

        throw new Exception\TypeException(
            'Value does not match any of declared types'
        );
    }

    public function fromArray(array $value)
    {
        foreach ($this->types as $type) {
            try {
                if ($type instanceof StructuredInterface) {
                    return $type->fromArray($value);
                }

                return $type->cast($value);
            } catch (Exception\TypeException $e) {
                continue;
            }
        }

        throw new Exception\TypeException(
            'Value does not match any of declared types'
        );
    }

    public function toArray($value)
    {
        foreach ($this->types as $type) {
            try {
                if ($type instanceof StructuredInterface) {
                    return $type->toArray($value);
                }
            } catch (Exception\TypeException $e) {
                continue;
            }
        }

        return $value;
    }

}
