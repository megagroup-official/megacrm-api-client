<?php

namespace Megagroup\MegaCrm\Api\Request\Deal;

use Megagroup\MegaCrm\Api;
use Megagroup\MegaCrm\Api\Exception\ResponseException;
use Megagroup\MegaCrm\Api\RequestAbstract;
use Megagroup\MegaCrm\Api\Response\Deal;
use Megagroup\MegaCrm\Api\Type\Boolean;
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
 * @method int|int[] getClientId()
 * @method int|int[] getDoerId()
 * @method int|int[] getSourceId()
 * @method int|int[] getStatusId()
 * @method int|int[] getTagId()
 * @method int getCreateTimeFrom()
 * @method int getCreateTimeTo()
 * @method int getUpdateTimeFrom()
 * @method int getUpdateTimeTo()
 * @method int getDoneTimeFrom()
 * @method int getDoneTimeTo()
 * @method int getPostponeTimeFrom()
 * @method int getPostponeTimeTo()
 * @method bool getDone()
 * @method bool getPostponed()
 * @method array getCustomFields()
 * @method int getPage()
 * @method int getLimit()
 *
 * @method Filter setId(int|int[] $id)
 * @method Filter setQuery(string $query)
 * @method Filter setCategoryId(int|int[] $category_id)
 * @method Filter setClientId(int|int[] $client_id)
 * @method Filter setDoerId(int|int[] $doer_id)
 * @method Filter setSourceId(int|int[] $source_id)
 * @method Filter setStatusId(int|int[] $status_id)
 * @method Filter setTagId(int|int[] $tag_id)
 * @method Filter setCreateTimeFrom(int $create_time_from)
 * @method Filter setCreateTimeTo(int $create_time_to)
 * @method Filter setUpdateTimeFrom(int $update_time_from)
 * @method Filter setUpdateTimeTo(int $update_time_to)
 * @method Filter setDoneTimeFrom(int $done_time_from)
 * @method Filter setDoneTimeTo(int $done_time_to)
 * @method Filter setPostponeTimeFrom(int $postpone_time_from)
 * @method Filter setPostponeTimeTo(int $postpone_time_to)
 * @method Filter setDone(bool $done)
 * @method Filter setPostponed(bool $postponed)
 * @method Filter setCustomFields(array $custom_fields)
 * @method Filter setPage(int $page)
 * @method Filter setLimit(int $limit)
 *
 * @method Deal[] invoke(Api\Client $client)
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
    protected $client_id;

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
    protected $status_id;

    /**
     * @var int|int[]
     */
    protected $tag_id;

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
     * @var int
     */
    protected $done_time_from;

    /**
     * @var int
     */
    protected $done_time_to;

    /**
     * @var int
     */
    protected $postpone_time_from;

    /**
     * @var int
     */
    protected $postpone_time_to;

    /**
     * @var bool
     */
    protected $done;

    /**
     * @var bool
     */
    protected $postponed;

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
                new ListOf(new Integer),
                new Integer,
            ]),

            'query' => new Generic,

            'category_id' => new EitherOf([
                new ListOf(new Integer),
                new Integer,
            ]),

            'client_id' => new EitherOf([
                new ListOf(new Integer),
                new Integer,
            ]),

            'doer_id' => new EitherOf([
                new ListOf(new Integer),
                new Integer,
            ]),

            'source_id' => new EitherOf([
                new ListOf(new Integer),
                new Integer,
            ]),

            'status_id' => new EitherOf([
                new ListOf(new Integer),
                new Integer,
            ]),

            'tag_id' => new EitherOf([
                new ListOf(new Integer),
                new Integer,
            ]),

            'create_time_from' => new Integer,
            'create_time_to' => new Integer,
            'update_time_from' => new Integer,
            'update_time_to' => new Integer,
            'done_time_from' => new Integer,
            'done_time_to' => new Integer,
            'postpone_time_from' => new Integer,
            'postpone_time_to' => new Integer,
            'done' => new Boolean,
            'postponed' => new Boolean,

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

        return (new ListOf(new ClassOf(Deal::class)))->fromArray($response);
    }

}
