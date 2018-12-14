<?php

namespace Megagroup\MegaCrm\Api;

interface RequestInterface extends \JsonSerializable
{

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getUrl();

    public function invoke(Client $client);

    public function parseResponse($response);

}
