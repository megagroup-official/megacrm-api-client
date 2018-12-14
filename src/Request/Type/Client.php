<?php

namespace Megagroup\MegaCrm\Api\Request\Type;

use Megagroup\MegaCrm\Api\Type\Boolean;
use Megagroup\MegaCrm\Api\Type\ClassOf;
use Megagroup\MegaCrm\Api\Type\EitherOf;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\ListOf;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method string getName()
 * @method int getType()
 * @method int getCategoryId()
 * @method int getDoerId()
 * @method int getSourceId()
 * @method string getLastName()
 * @method string getPatronymic()
 * @method int getGender()
 * @method string getDescription()
 * @method bool getDeleted()
 * @method CustomField[] getFields()
 * @method array getTags()
 *
 * @method Client setId(int $id)
 * @method Client setName(string $name)
 * @method Client setType(int $type)
 * @method Client setCategoryId(int $category_id)
 * @method Client setDoerId(int $doer_id)
 * @method Client setSourceId(int $source_id)
 * @method Client setLastName(string $last_name)
 * @method Client setPatronymic(string $patronymic)
 * @method Client setGender(int $gender)
 * @method Client setDescription(string $description)
 * @method Client setDeleted(bool $deleted)
 * @method Client setFields(CustomField[] $fields)
 * @method Client setTags(array $tags)
 */
class Client extends StructAbstract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var int
     */
    protected $category_id;

    /**
     * @var int
     */
    protected $doer_id;

    /**
     * @var int
     */
    protected $source_id;

    /**
     * @var string
     */
    protected $last_name;

    /**
     * @var string
     */
    protected $patronymic;

    /**
     * @var int
     */
    protected $gender;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var bool
     */
    protected $deleted;

    /**
     * @var CustomField[]
     */
    protected $fields;

    /**
     * @var array
     */
    protected $tags;

    protected function getProperties()
    {
        return [
            'id' => new Integer,
            'name' => new Generic,
            'type' => new Integer,
            'category_id' => new Integer,
            'doer_id' => new Integer,
            'source_id' => new Integer,
            'last_name' => new Generic,
            'patronymic' => new Generic,
            'gender' => new Integer,
            'description' => new Generic,
            'deleted' => new Boolean,
            'fields' => new ListOf(new ClassOf(CustomField::class)),
            'tags' => new ListOf(new EitherOf([new Integer, new Generic])),
        ];
    }

}
