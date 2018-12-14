<?php

namespace Megagroup\MegaCrm\Api\Type;

class ListOf implements StructuredInterface
{

    /**
     * @var TypeInterface
     */
    protected $type;

    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    public function cast($value)
    {
        if (!is_array($value)) {
            throw new Exception\TypeException('Value must be array');
        }

        $result = [];

        foreach ($value as $index => $item) {
            try {
                $cast_value = $this->type->cast($item);
            } catch (Exception\TypeException $e) {
                throw new Exception\TypeException(
                    "Invalid value of list item at index '${index}': {$e->getMessage()}",
                    0,
                    $e
                );
            }

            $result[$index] = $cast_value;
        }

        return $result;
    }

    public function fromArray(array $value)
    {
        if (!is_array($value)) {
            throw new Exception\TypeException('Value must be array');
        }

        $result = [];

        foreach ($value as $index => $item) {
            try {
                if ($this->type instanceof StructuredInterface) {
                    $cast_value = $this->type->fromArray($item);
                } else {
                    $cast_value = $this->type->cast($item);
                }
            } catch (Exception\TypeException $e) {
                throw new Exception\TypeException(
                    "Invalid value of list item at index '${index}': {$e->getMessage()}",
                    0,
                    $e
                );
            }

            $result[$index] = $cast_value;
        }

        return $result;
    }

    public function toArray($value)
    {
        if (!is_array($value)) {
            throw new Exception\TypeException('Value must be array');
        }

        if (!($this->type instanceof StructuredInterface)) {
            return $value;
        }

        $result = [];

        foreach ($value as $index => $item) {
            try {
                $cast_value = $this->type->toArray($item);
            } catch (Exception\TypeException $e) {
                throw new Exception\TypeException(
                    "Invalid value of list item at index '${index}': {$e->getMessage()}",
                    0,
                    $e
                );
            }

            $result[$index] = $cast_value;
        }

        return $result;
    }

}
