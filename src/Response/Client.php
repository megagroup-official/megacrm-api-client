<?php

namespace Megagroup\MegaCrm\Api\Response;

use Megagroup\MegaCrm\Api\Response\Type\CustomField;
use Megagroup\MegaCrm\Api\Response\Type\Client\Category;
use Megagroup\MegaCrm\Api\Response\Type\Client\Source;
use Megagroup\MegaCrm\Api\Response\Type\Tag;
use Megagroup\MegaCrm\Api\Type\Boolean;
use Megagroup\MegaCrm\Api\Type\ClassOf;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\ListOf;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method int getUiId()
 * @method int getCreatorId()
 * @method int getDoerId()
 * @method string getName()
 * @method string getLastName()
 * @method string getPatronymic()
 * @method int getGender()
 * @method int getType()
 * @method string getDescription()
 * @method int getCreated()
 * @method int getUpdated()
 * @method bool getDeleted()
 * @method Category getCategory()
 * @method Source getSource()
 * @method CustomField[] getCustom_fields()
 * @method Tag[] getTags()
 *
 * @method Client setId(int $id)
 * @method Client setUiId(int $ui_id)
 * @method Client setCreatorId(int $creator_id)
 * @method Client setDoerId(int $doer_id)
 * @method Client setName(string $name)
 * @method Client setLastName(string $last_name)
 * @method Client setPatronymic(string $patronymic)
 * @method Client setGender(int $gender)
 * @method Client setType(int $type)
 * @method Client setDescription(string $description)
 * @method Client setCreated(int $created)
 * @method Client setUpdated(int $updated)
 * @method Client setDeleted(bool $deleted)
 * @method Client setCategory(Category $category)
 * @method Client setSource(Source $source)
 * @method Client setCustom_fields(CustomField[] $custom_fields)
 * @method Client setTags(Tag[] $tags)
 */
class Client extends StructAbstract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $ui_id;

    /**
     * @var int
     */
    protected $creator_id;

    /**
     * @var int
     */
    protected $doer_id;

    /**
     * @var string
     */
    protected $name;

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
     * @var int
     */
    protected $type;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $created;

    /**
     * @var int
     */
    protected $updated;

    /**
     * @var bool
     */
    protected $deleted;

    /**
     * @var Category
     */
    protected $category;

    /**
     * @var Source
     */
    protected $source;

    /**
     * @var CustomField[]
     */
    protected $custom_fields;

    /**
     * @var Tag[]
     */
    protected $tags;

    protected function getProperties()
    {
        return [
            'id' => new Integer,
            'ui_id' => new Integer,
            'creator_id' => new Integer,
            'doer_id' => new Integer,
            'name' => new Generic,
            'last_name' => new Generic,
            'patronymic' => new Generic,
            'gender' => new Integer,
            'type' => new Integer,
            'description' => new Generic,
            'created' => new Integer,
            'updated' => new Integer,
            'deleted' => new Boolean,
            'category' => new ClassOf(Category::class),
            'source' => new ClassOf(Source::class),
            'custom_fields' => new ListOf(new ClassOf(CustomField::class)),
            'tags' => new ListOf(new ClassOf(Tag::class)),
        ];
    }

}
