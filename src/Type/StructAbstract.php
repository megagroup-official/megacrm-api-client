<?php

namespace Megagroup\MegaCrm\Api\Type;

abstract class StructAbstract implements \JsonSerializable
{

    /**
     * @return TypeInterface[]
     */
    abstract protected function getProperties();

    public function __call($name, $arguments)
    {
        $prefix = substr($name, 0, 3);
        $properties = $this->getProperties();

        if ($prefix === 'get') {
            $property_name = self::camelCaseToSnakeCase(substr($name, 3));

            if (!isset($properties[$property_name])) {
                throw new \BadMethodCallException(
                    "Property '{$property_name}' is not declared"
                );
            }

            if (!property_exists($this, $property_name)) {
                throw new \LogicException(
                    "Property '{$property_name}' is not defined in " . get_class($this)
                );
            }

            return $this->$property_name;
        } elseif ($prefix === 'set') {
            $property_name = self::camelCaseToSnakeCase(substr($name, 3));

            if (!isset($properties[$property_name])) {
                throw new \BadMethodCallException(
                    "Property '{$property_name}' is not declared on " . get_class($this)
                );
            }

            if (!property_exists($this, $property_name)) {
                throw new \LogicException(
                    "Property '{$property_name}' is not defined in" . get_class($this)
                );
            }

            if (!$arguments) {
                throw new \BadMethodCallException(
                    'Too few arguments for ' . get_class($this) . "::{$name}"
                );
            }

            try {
                $this->$property_name = $properties[$property_name]
                    ->cast($arguments[0]);
            } catch (Exception\TypeException $e) {
                throw new Exception\TypeException(
                    "Cannot set property '{$property_name}': {$e->getMessage()}",
                    0,
                    $e
                );
            }

            return $this;
        }

        throw new \BadMethodCallException(
            'Call to undefined method ' . get_class($this) . "::{$name}"
        );
    }

    public function fromArray($value)
    {
        if (!is_array($value)) {
            throw new Exception\TypeException('Value must be array');
        }

        $properties = $this->getProperties();

        foreach ($properties as $property_name => $type) {
            if (!property_exists($this, $property_name)) {
                throw new \LogicException(
                    "Property '{$property_name}' is not defined in " . get_class($this)
                );
            }

            if (!array_key_exists($property_name, $value)) {
                continue;
            }

            if ($value[$property_name] === null) {
                $this->$property_name = null;

                continue;
            }

            try {
                if ($type instanceof StructuredInterface) {
                    $this->$property_name = $type->fromArray($value[$property_name]);
                } else {
                    $this->$property_name = $type->cast($value[$property_name]);
                }
            } catch (Exception\TypeException $e) {
                throw new Exception\TypeException(
                    "Cannot unserialize property '{$property_name}': {$e->getMessage()}",
                    0,
                    $e
                );
            }
        }

        return $this;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        $properties = $this->getProperties();
        $result = [];

        foreach ($properties as $property_name => $type) {
            if (!property_exists($this, $property_name)) {
                throw new \LogicException(
                    "Property '{$property_name}' is not defined in " . get_class($this)
                );
            }

            if (!isset($this->$property_name)) {
                continue;
            }

            if ($type instanceof StructuredInterface) {
                $result[$property_name] = $type->toArray($this->$property_name);
            } else {
                $result[$property_name] = $this->$property_name;
            }
        }

        return $result;
    }

    private static function camelCaseToSnakeCase($name)
    {
        return strtolower(preg_replace('/[A-Z]/', '_\0', lcfirst($name)));
    }

}
