<?php

namespace Megagroup\MegaCrm\Api\Request\Client;

use Megagroup\MegaCrm\Api;
use Megagroup\MegaCrm\Api\Exception\ResponseException;
use Megagroup\MegaCrm\Api\ListRequestAbstract;
use Megagroup\MegaCrm\Api\Request\Type\Client;
use Megagroup\MegaCrm\Api\Type\ClassOf;
use Megagroup\MegaCrm\Api\Type\Integer;
use Megagroup\MegaCrm\Api\Type\ListOf;

/**
 * @method int[] invoke(Api\Client $client)
 */
class Create extends ListRequestAbstract
{

    public function __construct()
    {
        parent::__construct(new ClassOf(Client::class));
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getUrl()
    {
        return 'clients';
    }

    public function parseResponse($response)
    {
        if (!is_array($response)) {
            throw new ResponseException(
                'Expected array response, got ' . gettype($response)
            );
        }

        return (new ListOf(new Integer))->fromArray($response);
    }

}
