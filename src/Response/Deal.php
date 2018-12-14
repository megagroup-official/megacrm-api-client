<?php

namespace Megagroup\MegaCrm\Api\Response;

use Megagroup\MegaCrm\Api\Response\Type\Currency;
use Megagroup\MegaCrm\Api\Response\Type\CustomField;
use Megagroup\MegaCrm\Api\Response\Type\Deal\Category;
use Megagroup\MegaCrm\Api\Response\Type\Deal\RejectReason;
use Megagroup\MegaCrm\Api\Response\Type\Deal\Source;
use Megagroup\MegaCrm\Api\Response\Type\Deal\Status;
use Megagroup\MegaCrm\Api\Response\Type\Tag;
use Megagroup\MegaCrm\Api\Type\Boolean;
use Megagroup\MegaCrm\Api\Type\ClassOf;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\ListOf;
use Megagroup\MegaCrm\Api\Type\RealNumber;
use Megagroup\MegaCrm\Api\Type\StructAbstract;

/**
 * @method int getId()
 * @method int getUiId()
 * @method string getTitle()
 * @method string getDescription()
 * @method int getCreatorId()
 * @method int getClientId()
 * @method int getDoerId()
 * @method int getPriceType()
 * @method float getPrice()
 * @method float getPriceTotal()
 * @method float getPriceVat()
 * @method int getCreated()
 * @method int getUpdated()
 * @method int getPostpone()
 * @method int getFinished()
 * @method bool getDeleted()
 * @method Currency getCurrency()
 * @method RejectReason getRejectReason()
 * @method Source getSource()
 * @method Status getStatus()
 * @method Category getCategory()
 * @method CustomField[] getCustomFields()
 * @method Tag[] getTags()
 *
 * @method Deal setId(int $id)
 * @method Deal setUiId(int $ui_id)
 * @method Deal setTitle(string $title)
 * @method Deal setDescription(string $description)
 * @method Deal setCreatorId(int $creator_id)
 * @method Deal setClientId(int $client_id)
 * @method Deal setDoerId(int $doer_id)
 * @method Deal setPriceType(int $price_type)
 * @method Deal setPrice(float $price)
 * @method Deal setPriceTotal(float $price_total)
 * @method Deal setPriceVat(float $price_vat)
 * @method Deal setCreated(int $created)
 * @method Deal setUpdated(int $updated)
 * @method Deal setPostpone(int $postpone)
 * @method Deal setFinished(int $finished)
 * @method Deal setDeleted(bool $deleted)
 * @method Deal setCurrency(Currency $currency)
 * @method Deal setRejectReason(RejectReason $reject_reason)
 * @method Deal setSource(Source $source)
 * @method Deal setStatus(Status $status)
 * @method Deal setCategory(Category $category)
 * @method Deal setCustomFields(CustomField[] $custom_fields)
 * @method Deal setTags(Tag[] $tags)
 */
class Deal extends StructAbstract
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
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $creator_id;

    /**
     * @var int
     */
    protected $client_id;

    /**
     * @var int
     */
    protected $doer_id;

    /**
     * @var int
     */
    protected $price_type;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    protected $price_total;

    /**
     * @var float
     */
    protected $price_vat;

    /**
     * @var int
     */
    protected $created;

    /**
     * @var int
     */
    protected $updated;

    /**
     * @var int
     */
    protected $postpone;

    /**
     * @var int
     */
    protected $finished;

    /**
     * @var bool
     */
    protected $deleted;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @var RejectReason
     */
    protected $reject_reason;

    /**
     * @var Source
     */
    protected $source;

    /**
     * @var Status
     */
    protected $status;

    /**
     * @var Category
     */
    protected $category;

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
            'title' => new Generic,
            'description' => new Generic,
            'creator_id' => new Integer,
            'client_id' => new Integer,
            'doer_id' => new Integer,
            'price_type' => new Integer,
            'price' => new RealNumber,
            'price_total' => new RealNumber,
            'price_vat' => new RealNumber,
            'created' => new Integer,
            'updated' => new Integer,
            'postpone' => new Integer,
            'finished' => new Integer,
            'deleted' => new Boolean,
            'currency' => new ClassOf(Currency::class),
            'reject_reason' => new ClassOf(RejectReason::class),
            'source' => new ClassOf(Source::class),
            'status' => new ClassOf(Status::class),
            'category' => new ClassOf(Category::class),
            'custom_fields' => new ListOf(new ClassOf(CustomField::class)),
            'tags' => new ListOf(new ClassOf(Tag::class)),
        ];
    }

}
