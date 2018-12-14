<?php

namespace Megagroup\MegaCrm\Api;

trait RequestInvokeTrait
{

    public function invoke(Client $client)
    {
        return $client->send($this);
    }

}
