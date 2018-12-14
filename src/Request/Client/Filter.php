<?php

namespace Megagroup\MegaCrm\Api\Request\Client;

use Megagroup\MegaCrm\Api;
use Megagroup\MegaCrm\Api\Exception\ResponseException;
use Megagroup\MegaCrm\Api\RequestAbstract;
use Megagroup\MegaCrm\Api\Response\Client;
use Megagroup\MegaCrm\Api\Type\ClassOf;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\EitherOf;
use Megagroup\MegaCrm\Api\Type\Generic;
use Megagroup\MegaCrm\Api\Type\ListOf;
use Megagroup\MegaCrm\Api\Type\Range;

/**
 * @method int|int[] getId()
 * @method string getQuery()
 * @method int|int[] getCategoryId()
 * @method int|int[] getDoerId()
 * @method int|int[] getSourceId()
 * @method int|int[] getTagId()
 * @method int|int[] getType()
 * @method int getCreateTimeFrom()
 * @method int getCreateTimeTo()
 * @method int getUpdateTimeFrom()
 * @method int getUpdateTimeTo()
 * @method array getCustomFields()
 * @method int getPage()
 * @method int getLimit()
 *
 * @method Filter setId(int|int[] $id)
 * @method Filter setQuery(string $query)
 * @method Filter setCategoryId(int|int[] $category_id)
 * @method Filter setDoerId(int|int[] $doer_id)
 * @method Filter setSourceId(int|int[] $source_id)
 * @method Filter setTagId(int|int[] $tag_id)
 * @method Filter setType(int|int[] $type)
 * @method Filter setCreateTimeFrom(int $create_time_from)
 * @method Filter setCreateTimeTo(int $create_time_to)
 * @method Filter setUpdateTimeFrom(int $update_time_from)
 * @method Filter setUpdateTimeTo(int $update_time_to)
 * @method Filter setCustomFields(array $custom_fields)
 * @method Filter setPage(int $page)
 * @method Filter setLimit(int $limit)
 *
 * @method Client[] invoke(Api\Client $client)
 */
class Filter extends RequestAbstract
{

    /**
     * @var int|int[]
     */
    protected $id;

    /**
     * @var string
     */
    protected $query;

    /**
     * @var int|int[]
     */
    protected $category_id;

    /**
     * @var int|int[]
     */
    protected $doer_id;

    /**
     * @var int|int[]
     */
    protected $source_id;

    /**
     * @var int|int[]
     */
    protected $tag_id;

    /**
     * @var int|int[]
     */
    protected $type;

    /**
     * @var int
     */
    protected $create_time_from;

    /**
     * @var int
     */
    protected $create_time_to;

    /**
     * @var int
     */
    protected $update_time_from;

    /**
     * @var int
     */
    protected $update_time_to;

    /**
     * @var array
     */
    protected $custom_fields;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $limit;

    public function getMethod()
    {
        return 'GET';
    }

    public function getUrl()
    {
        return 'deals';
    }

    protected function getProperties()
    {
        return [
            'id' => new EitherOf([
                new Integer,
                new ListOf(new Integer),
            ]),

            'query' => new Generic,

            'category_id' => new EitherOf([
                new Integer,
                new ListOf(new Integer),
            ]),

            'doer_id' => new EitherOf([
                new Integer,
                new ListOf(new Integer),
            ]),

            'source_id' => new EitherOf([
                new Integer,
                new ListOf(new Integer),
            ]),

            'tag_id' => new EitherOf([
                new Integer,
                new ListOf(new Integer),
            ]),

            'type' => new EitherOf([
                new Integer,
                new ListOf(new Integer),
            ]),

            'create_time_from' => new Integer,
            'create_time_to' => new Integer,
            'update_time_from' => new Integer,
            'update_time_to' => new Integer,

            'custom_fields' => new ListOf(
                new EitherOf([new Generic, new ClassOf(Range::class)])
            ),

            'page' => new Integer,
            'limit' => new Integer,
        ];
    }

    public function parseResponse($response)
    {
        if (!is_array($response)) {
            throw new ResponseException(
                'Expected array response, got ' . gettype($response)
            );
        }

        return (new ListOf(new ClassOf(Client::class)))->fromArray($response);
    }

}
