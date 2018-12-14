<?php

namespace Megagroup\MegaCrm\Api\Request\Client;

class Update extends Create
{

    public function getMethod()
    {
        return 'PATCH';
    }

}
