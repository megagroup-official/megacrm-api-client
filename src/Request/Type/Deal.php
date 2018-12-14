<?php

namespace Megagroup\MegaCrm\Api\Request\Type;

use Megagroup\MegaCrm\Api\Type\Boolean;
use Megagroup\MegaCrm\Api\Type\ClassOf;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\EitherOf;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\ListOf;
use Megagroup\MegaCrm\Api\Type\RealNumber;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method string getTitle()
 * @method int getPriceType()
 * @method int getCategoryId()
 * @method int getClientId()
 * @method int getCurrencyId()
 * @method int getDoerId()
 * @method int getRejectReasonId()
 * @method int getSourceId()
 * @method int getStatusId()
 * @method string getDescription()
 * @method float getPrice()
 * @method int getPostpone()
 * @method bool getDeleted()
 * @method CustomField[] getFields()
 * @method array getTags()
 *
 * @method Deal setId(int $id)
 * @method Deal setTitle(string $title)
 * @method Deal setPriceType(int $price_type)
 * @method Deal setCategoryId(int $category_id)
 * @method Deal setClientId(int $client_id)
 * @method Deal setCurrencyId(int $currency_id)
 * @method Deal setDoerId(int $doer_id)
 * @method Deal setRejectReasonId(int $reject_reason_id)
 * @method Deal setSourceId(int $source_id)
 * @method Deal setStatusId(int $status_id)
 * @method Deal setDescription(string $description)
 * @method Deal setPrice(float $price)
 * @method Deal setPostpone(int $postpone)
 * @method Deal setDeleted(bool $deleted)
 * @method Deal setFields(CustomField[] $fields)
 * @method Deal setTags(array $tags)
 */
class Deal extends StructAbstract
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $price_type;

    /**
     * @var int
     */
    protected $category_id;

    /**
     * @var int
     */
    protected $client_id;

    /**
     * @var int
     */
    protected $currency_id;

    /**
     * @var int
     */
    protected $doer_id;

    /**
     * @var int
     */
    protected $reject_reason_id;

    /**
     * @var int
     */
    protected $source_id;

    /**
     * @var int
     */
    protected $status_id;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var int
     */
    protected $postpone;

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
            'title' => new Generic,
            'price_type' => new Integer,
            'category_id' => new Integer,
            'client_id' => new Integer,
            'currency_id' => new Integer,
            'doer_id' => new Integer,
            'reject_reason_id' => new Integer,
            'source_id' => new Integer,
            'status_id' => new Integer,
            'description' => new Generic,
            'price' => new RealNumber,
            'postpone' => new Integer,
            'deleted' => new Boolean,
            'fields' => new ListOf(new ClassOf(CustomField::class)),
            'tags' => new ListOf(new EitherOf([new Integer, new Generic])),
        ];
    }

}
